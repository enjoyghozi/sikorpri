<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purnatugas extends Model
{
    protected $table ="purnatugas";
    protected $primaryKey ="id";
    protected $fillable = [
        'id',
        'nama_anggota',
        'nip',
        'unit',
        'bukti',
        'created_at',
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
