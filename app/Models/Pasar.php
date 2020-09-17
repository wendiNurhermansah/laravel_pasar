<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    protected $table    = 'tm_pasars';
    protected $fillable = ['id', 'kd_pasar', 'nm_pasar', 'luas_area', 'id_kel', 'id_kec', 'id_kab', 'latitude', 'longitude', 'jumlah_lapak', 'jumlah_pedagang', 'terpakai', 'created_at', 'updated_at'];
}
