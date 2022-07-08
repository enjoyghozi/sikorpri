<?php

namespace App\Imports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\ToModel;

class AnggotaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 
        return new Anggota([
            'nip' => $row[1],
            'nama' => $row[2],
            'golongan_id' => $row[3],
            'nominal' => $row[4],
            'daftar_unit_id' => $row[5],
        ]);
    }
}
