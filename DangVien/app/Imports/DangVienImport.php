<?php

namespace App\Imports;

use App\Models\dangviens;
use Maatwebsite\Excel\Concerns\ToModel;

class DangVienImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new dangviens([
            //
            'maThanhPho' => $row[0],
            'tenThanhPho'=> $row[1],
        ]);
    }
}
