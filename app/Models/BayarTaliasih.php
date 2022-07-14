<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarTaliasih extends Model
{
    use HasFactory;

    protected $table ="bayartaliasih";
    protected $primaryKey ="id";
    protected $fillable = [
        'id',
        'daftar_unit_id',
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
