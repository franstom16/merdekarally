<?php

namespace App\Repositories;

use App\Interfaces\AsessmentRepositoryInterface;
use App\Imports\AssessmentImport;
use App\Models\Assessment;
use App\Models\Peserta;
use App\Models\vAssessment;
use App\Traits\Responses;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use DB;

class AsessmentRepository implements AsessmentRepositoryInterface
{
    use Responses;

    public function getDataTable($filter)
    {
        try
        {
            $data = vAssessment::select('*');
            return DataTables::of($data)
                    ->addColumn('action', function($row) use ($filter) {
                        return '<form onSubmit="return deleteData(this)" method="post" action="'. url('assessments/' . $row->id) .'">' .
                                    '<a href="'. url('assessments/' . $row->id . '/edit') .'" class="btn btn-icon p-1"><i class="icon-pencil5 text-primary"></i></a>' .
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
                $time       = $data->race_time;
                
                $file->move(storage_path('import'), $file->getClientOriginalName());
                
                $excel      = Excel::toArray(new ParticipantImport, storage_path('import') .'/'. $file->getClientOriginalName());
                $no         = 0;
                $arrTeam    = $arrClass = [];          
                foreach ($excel[0] as $ex)
                {
                    if (!empty($ex[0]))
                    {
                        if ($no > 0)
                        {
                            if (!empty($ex[0]))
                            {
                                $usr = Peserta::where('participant_code', $ex[1])->first();
                                if (!empty($usr->id))
                                {
                                    $data = ['participant_id' => $usr->id, $time => $ex[0]];
                                    $race = Assessment::where('participant_id', $usr->id)->first();
                                    if (!empty($race->id))
                                        $qry = Assessment::where('id', $race->id)->update($data);
                                    else
                                        $qry = Assessment::create($data);

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
