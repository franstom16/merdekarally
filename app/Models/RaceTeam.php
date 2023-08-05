<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class RaceTeam extends Model
{
    protected $table = 'race_teams';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
