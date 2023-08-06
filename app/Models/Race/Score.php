<?php

namespace App\Models\Race;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Score extends Model
{
    protected $table = 'race_scores';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function rules()
    {
        return [
            'class_id'  => 'required',
            'min_time'  => 'required|numeric',
            'max_time'  => 'required|numeric',
            'score'     => 'required|numeric'
        ];
    }
}
