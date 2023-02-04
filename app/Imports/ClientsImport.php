<?php

namespace App\Imports;
use App\Client;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithChunkReading, ShouldQueue ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    /* fonction to convert date for mise en service */
    public function transformDate($value, $format = 'd-m-Y hh:mm')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function model(array $row)
    {

        return new Client([

            'id' => $row['id'],
            'name_client'=> $row['name_client'],
            'poste_id'=> $row['poste_id'],
            'depart'=> $row['depart'],
            'u_client'=> $row['u_client'],
            
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }



}
