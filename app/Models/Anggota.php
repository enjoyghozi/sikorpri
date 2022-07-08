<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Anggota extends Model
{
    use Sortable;

    protected $table = "anggota";
    protected $primaryKey = "id";
    protected $fillable = [
        'nip',
        'nama',
        'golongan_id',
        'nominal',
        'daftar_unit_id',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function daftar_unit()
    {
        return $this->belongsTo(Daftar_unit::class);
    }
    public $timestamps = false;

}
