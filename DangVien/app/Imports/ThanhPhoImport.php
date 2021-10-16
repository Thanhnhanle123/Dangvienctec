<?php

namespace App\Imports;

use App\Models\Thanhpho;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Throwable;
class ThanhPhoImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Thanhpho([
            //
            'maThanhPho' => strtoupper($row['key']),
            'tenThanhPho'=> ucwords($row['ten_thanh_pho']),

        ]);
    }

}
