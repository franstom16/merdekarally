<?php

namespace App\Models\Race;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Team extends Model
{
    protected $table = 'race_teams';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
