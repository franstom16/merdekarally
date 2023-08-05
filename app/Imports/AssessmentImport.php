<?php

namespace App\Imports;

use App\Models\Assessment;
use Maatwebsite\Excel\Concerns\ToModel;
use Auth;

class AssessmentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Assessment([
            'time'              => $row[0],
            'participant_code'  => $row[1],
        ]);
    }
}