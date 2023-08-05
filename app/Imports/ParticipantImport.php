<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\ToModel;
use Auth;

class ParticipantImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Participant([
            'participant_code'  => $row[1],
            'participant_name'  => $row[2],
            'team_name'         => $row[3],
            'race_category'     => $row[4],
            'class_name'        => $row[5],
            'blood'             => $row[6]
        ]);
    }
}