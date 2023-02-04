<?php

namespace App\Imports;
use App\Transite;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransitesImport implements ToModel, WithChunkReading, ShouldQueue ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    /* fonction to convert date for mise en service */
    public function transformDate($value, $format = 'Y-m-d hh:mm')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function model(array $row)
    {

        return new Transite([

            'id' => $row['id'],
            'datetime'=>  $this->transformDate($row['datetime']),
            'poste_id'=> $row['poste_id'],
            'depart'=> $row['depart'],
            'tension'=> $row['tension'],
            'pactif'=> $row['pactif'],
            'qreactif'=> $row['qreactif'],
            
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }



}
