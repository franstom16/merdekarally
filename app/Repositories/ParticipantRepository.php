<?php

namespace App\Repositories;

use App\Interfaces\ParticipantRepositoryInterface;
use App\Models\Participant;
use DataTables;
use DB;

class ParticipantRepository implements ParticipantRepositoryInterface
{
    public function getDataTable($filter)
    {
        try
        {
            $select = ['id', 'name', 'phone', 'email', DB::raw("CONCAT(address, ' ', address2) AS address")];
            $data   = User::select($select)->where([['deleted', false], ['usertype', 'relawan']]);
            return  DataTables::of($data)
                    ->addColumn('action', function($row) use ($filter) {
                        return '<form onSubmit="return deleteRelawan(this)" method="post" action="'. url('user/' . $row->id) .'">' .
                                    '<button type="button" class="btn btn-icon p-1" onClick="relawanDetail(this)" data-id="' . $row->id . '"><i class="icon-eye"></i></button>' .
                                    '<a href="'. url('relawan/' . $row->id . '/edit') .'" class="btn btn-icon p-1"><i class="icon-pencil5 text-primary"></i></a>' .
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
}
