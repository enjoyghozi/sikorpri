<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taliasih extends Model
{
    protected $table = "taliasih";
    protected $primarykey = "id";
    protected $fillable = [
        'id','unit','tanggal','nominal'
    ];
}
