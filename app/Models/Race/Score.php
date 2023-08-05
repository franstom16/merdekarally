<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Score extends Model
{
    protected $table = 'race_scores';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
