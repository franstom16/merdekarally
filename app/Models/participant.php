<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Participant extends Model
{
    protected $table = 'participants';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
