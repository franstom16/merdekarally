<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'participants';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
