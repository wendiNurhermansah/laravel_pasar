<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table    = 'jurusan';
    protected $fillable = ['id', 'nama', 'created_at', 'updated_at'];

    
}
