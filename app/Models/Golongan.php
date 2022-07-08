<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = "golongan";
    protected $primaryKey = "id";
    protected $fillable = [
        'golongan',
        'nominal',
    ];

    public function anggota() {
        return $this ->hasMany(Anggota::class);
    }
}
