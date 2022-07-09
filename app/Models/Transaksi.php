<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table ="transaksi";
    protected $primaryKey ="id";
    protected $fillable = [
        'daftar_unit_id',
        'jenis_pembayaran',
        'total_pembayaran',
        'tanggal_pembayaran',
        'foto_bukti',
    ];
}
