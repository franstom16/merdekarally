<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Assessment extends Model
{
    protected $table = 'competition_assestments';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
