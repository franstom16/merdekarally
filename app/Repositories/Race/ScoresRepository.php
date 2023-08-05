<?php

namespace App\Repositories\Race;

use App\Interfaces\Race\ScoresRepositoryInterface;
use App\Imports\Race\ScoreImport;
use App\Models\Peserta;
use App\Models\Race\RaceClass;
use App\Models\Race\Score;
use App\Traits\Responses;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use DB;

class ScoresRepository implements ScoresRepositoryInterface
{
    use Responses;

    public function getDataTable($filter)
    {
        try
        {
            $data = Score::join('race_class as b', 'b.id', 'race_scores.class_id')->select('race_scores.*', 'b.class_name');
            return DataTables::of($data)
                    ->addColumn('action', function($row) use ($filter) {
                        return '<form onSubmit="return deleteData(this)" method="post" action="'. url('race/scores/' . $row->id) .'">' .
                                    '<a href="'. url('race/scores/' . $row->id . '/edit') .'" class="btn btn-icon p-1"><i class="icon-pencil5 text-primary"></i></a>' .
                                    '<input type="hidden" name="_method" value="DELETE" />' .
                                    '<input type="hidden" name="_token" value="'. $filter['_token'] .'" />' .
                                    '<button type="submit" class="btn btn-icon p-1" data-id="'. $row->id .'"><i class="icon-trash text-danger"></i></button>' .
                                '</form>';
                    })
                    ->toJson();
        }
        catch (\Exception $e)
        {
            return (object) ['errors' => ['error_code' => 500, 'error_msg' => $e->getMessage()]];
        }
    }

    public function importData($data)
    {
        try
        {
            $validator  = $this->validation($data->file(), ['file_import' => 'required|max:2048|mimes:xls,xlsx']);
            if (!empty($validator))
            {
                return $validator;
            }
            else
            {            
                $fail       = $success = 0;
                $dtlSucc    = $dtlFail =  [];
                $file       = $data->file('file_import');
                
                $file->move(storage_path('import'), $file->getClientOriginalName());
                
                $excel      = Excel::toArray(new ScoreImport, storage_path('import') .'/'. $file->getClientOriginalName());
                $no         = 0;     
                foreach ($excel[0] as $ex)
                {
                    if (!empty($ex[0]))
                    {
                        if ($no > 0)
                        {
                            if (!empty($ex[0]))
                            {
                                $race = RaceClass::where('class_name', $ex[0])->first();
                                if (!empty($race->id))
                                {
                                    $data   = ['class_id' => $race->id, 'min_time' => $ex[1], 'max_time' => $ex[2], 'score' => $ex[3]];
                                    $score  = Score::where('class_id', $race->id)->first();
                                    if (!empty($race->id))
                                        $qry = Score::where('id', $score->id)->update($data);
                                    else
                                        $qry = Score::create($data);

                                    if ($qry)
                                        $success++;
                                    else
                                        $fail++;
                                }
                            }
                        }
                        $no++;
                    }
                }

                unlink(storage_path('import') .'/'. $file->getClientOriginalName());

                return ['success' => $success, 'fail' => $fail];
            }
        }
        catch (\Exception $e)
        {
            return (object) ['errors' => ['error_code' => 500, 'error_msg' => $e->getMessage()]];
        }
    }
}
