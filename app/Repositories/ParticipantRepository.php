<?php

namespace App\Repositories;

use App\Interfaces\ParticipantRepositoryInterface;
use App\Imports\ParticipantImport;
use App\Models\Participant as Participants;
use App\Models\RaceTeam;
use App\Models\RaceClass;
use App\Traits\Responses;
use App\Models\vParticipant;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use DB;

class ParticipantRepository implements ParticipantRepositoryInterface
{
    use Responses;

    public function getDataTable($filter)
    {
        try
        {
            $data = vParticipant::select('*');
            return DataTables::of($data)
                    ->addColumn('action', function($row) use ($filter) {
                        return '<form onSubmit="return deleteData(this)" method="post" action="'. url('participants/' . $row->id) .'">' .
                                    '<a href="'. url('participants/' . $row->id . '/edit') .'" class="btn btn-icon p-1"><i class="icon-pencil5 text-primary"></i></a>' .
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
            return Participants::get();
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
                
                $excel      = Excel::toArray(new ParticipantImport, storage_path('import') .'/'. $file->getClientOriginalName());
                $no         = 0;
                $arrTeam    = $arrClass = [];          
                foreach ($excel[0] as $ex)
                {
                    if (!empty($ex[0]))
                    {
                        if ($no > 0)
                        {
                            $team_id = $class_id = null;
                            if (in_array($ex[3], $arrTeam))
                            {
                                $team_id = $arrTeam[$ex[3]];
                            }
                            elseif (!empty($ex[3]))
                            {
                                $team = RaceTeam::where('team_name', $ex[3])->first();
                                if (!empty($team->id))
                                {
                                    $team_id = $team->id;
                                }
                                else
                                {
                                    $insTeam    = RaceTeam::create(['team_name' => $ex[3]]);
                                    $team_id    = $insTeam->id;
                                }
                                $arrTeam[$ex[3]] = $team_id;
                            }
                            
                            if (in_array($ex[5], $arrClass))
                            {
                                $class_id = $arrClass[$ex[5]];
                            }
                            elseif (!empty($ex[5]))
                            {
                                $class = RaceClass::where('class_name', $ex[5])->first();
                                if (!empty($class->id))
                                {
                                    $class_id = $class->id;
                                }
                                else
                                {
                                    $insClass   = RaceClass::create(['class_name' => $ex[5]]);
                                    $class_id   = $insClass->id;
                                }
                                $arrClass[$ex[5]] = $class_id;
                            }

                            $data   = [
                                        'participant_code'  => $ex[1], 
                                        'participant_name'  => $ex[2],
                                        'race_category'     => $ex[4],
                                        'blood'             => $ex[6],
                                        'team_id'           => $team_id,
                                        'class_id'          => $class_id
                                    ];
                            if ($qry = Participant::create($data))
                            {
                                array_push($dtlSucc, ['id' => $qry->id]);
                                $success++;
                            }
                            else
                            {
                                $fail++;
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
