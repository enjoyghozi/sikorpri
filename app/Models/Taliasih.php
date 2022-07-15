<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taliasih extends Model
{
    protected $table = "taliasih";
    protected $primarykey = "id";
    protected $fillable = [
        'nama_unit','jumlah_anggota','total','foto'
    ];

    public function daftar_unit()
    {
        return $this->belongsTo(Daftar_unit::class);
    }


    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
