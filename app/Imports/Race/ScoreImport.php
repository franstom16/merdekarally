<?php

namespace App\Imports\Race;

use App\Models\Race\Score;
use Maatwebsite\Excel\Concerns\ToModel;
use Auth;

class ScoreImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Score([
            'class_name'    => $row[0],
            'min_time'      => $row[1],
            'max_time'      => $row[2],
            'score'         => $row[4],
        ]);
    }
}