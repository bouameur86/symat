<?php

namespace App\Imports;
use App\Poste;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostesImport implements ToModel, WithChunkReading, ShouldQueue ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    /* fonction to convert date for mise en service */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function model(array $row)
    {

        return new Poste([

            'id' => $row['id'],
            'region_id'=> $row['region_id'],
            'name'=> $row['name'],
            'code'=> $row['code'],
            'nivU'=> $row['nivu'],
            'ste_id'=> $row['ste_id'],
            'clientxd'=> $row['clientxd'],
            'constructeur_id'=> $row['constructeur_id'],
            'commune_id'=> $row['commune_id'],
            'datemise'=> $this->transformDate($row['datemise']),
            
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }



}
