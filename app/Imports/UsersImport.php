<?php

namespace App\Imports;

use App\Ban;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);

        return new Ban([
            'guest_id' => 0,
            'ejercicio' => $row[0],
            'expediente' => $row[1],
            'fecha_resolucion' =>   Carbon::instance (Date::excelToDateTimeObject($row[2]) ),
            'delegacion' => $row[3],
            'identificacion' => $row[4],
            'nombre' => $row[5],
            'fecha_inicio' =>   Carbon::instance (Date::excelToDateTimeObject($row[6]) ),
            'fecha_fin' =>  Carbon::instance (Date::excelToDateTimeObject($row[7]) ),
        ]);
    }
}


