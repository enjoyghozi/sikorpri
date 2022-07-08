<?php

namespace App\Imports;

use App\Models\Daftar_unit;
use Maatwebsite\Excel\Concerns\ToModel;

class UnitImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Daftar_unit([
            'no' => $row[0],
            'nama' => $row[1],
        ]);
    }
}
