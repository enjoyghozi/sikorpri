<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Daftar_unit extends Model
{
    use Sortable;


    protected $table = "daftar_unit";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'nama',
    ];
    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function detail_pembayaran()
    {
        return $this->belongsTo(DetailPembayaran::class);
    }

    public $timestamps = false;

    public $sortable = [
        'id',
        'nama',
    ];

}
