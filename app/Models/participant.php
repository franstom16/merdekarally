<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Participant extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
