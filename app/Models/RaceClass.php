<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class RaceClass extends Model
{
    protected $table = 'race_class';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
