<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table    = 'mahasiswa';
    protected $fillable = ['id', 'nama', 'nim', 'id_kel', 'id_kec', 'id_kab', 'id_mapel', 'created_at', 'updated_at'];
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kel');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kec');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kab');
    }
    public function mapel()
    {
        return $this->belongsTo(mapel::class, 'id_mapel');
    }
    
}

