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
        return new Price([
            'product_id'    => $row[0],
            'price_date'    => $row[1],
            'price_value'   => $row[2]
        ]);
    }
}