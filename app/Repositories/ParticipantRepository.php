<?php

namespace App\Repositories;

use App\Interfaces\ParticipantRepositoryInterface;
use App\Imports\ParticipantImport;
use App\Models\vParticipant;
use App\Traits\Responses;
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
            $validator  = $this->validation($loginData, User::rulesLogin());
            if (!empty($validator))
            {
                return $validator;
            }
            else
            {            
                $fail       = $success = 0;
                $dtlSucc    = $dtlFail =  [];
                $file       = $request->file('file_import');
                
                $file->move(storage_path('import'), $file->getClientOriginalName());
                
                $excel  = Excel::toArray(new ParticipantImport, storage_path('import') .'/'. $file->getClientOriginalName());
                $no     = 0;            
                foreach ($excel[0] as $ex)
                {
                    if (!empty($ex[0]))
                    {
                        if ($no > 0)
                        {
                            $err = [];                    
                            if (!is_numeric($ex[1]))
                                $err[] = $ex[0] . ' format date invalid';
                            if (!is_numeric($ex[2]))
                                $err[] = $ex[0] . ' price must be numeric'; 
                            
                            if (empty($err))
                            {
                                $prd = Product::where([['product_code', $ex[0]], ['is_active', 'Yes']])->first();
                                if (!empty($prd->product_id))
                                {
                                    $date   = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($ex[1]);
                                    $data   = [
                                                'product_id'    => $prd->product_id, 
                                                'price_date'    => \Carbon\Carbon::instance($date), 
                                                'price_value'   => $ex[2],
                                                'created_by'    => $usrtyp.':'.$usrid.':'.$usrnm,
                                                'created_host'  => $ip
                                            ];
                                    if ($qry = Price::create($data))
                                    {
                                        array_push($dtlSucc, ['id' => $qry->price_id]);
                                        $success++;
                                    }
                                }
                                else
                                {
                                    array_push($dtlFail, [$ex[0] . ' data not found']);
                                    $fail++;
                                }
                            }
                            else
                            {
                                array_push($dtlFail, $err);
                                $fail++;
                            }
                        }
                        $no++;
                    }
                }

                unlink(storage_path('import') .'/'. $file->getClientOriginalName());

                $errors = [];
                if(!empty($dtlFail))
                {
                    if ($success > 0)
                        $dtlFail = array_merge([['Total Success : '. $success]], $dtlFail);
                    $errors = ['error_msg' => $dtlFail, 'error_code' => 422];
                }

                return $this->app_partials($success, $fail, $dtlSucc, $errors);
            }
        }
        catch (\Exception $e)
        {
            return (object) ['errors' => ['error_code' => 500, 'error_msg' => $e->getMessage()]];
        }
    }
}
