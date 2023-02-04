<?php

namespace App\Imports;
use App\Transfo;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransfosImport implements ToModel, WithChunkReading, ShouldQueue ,WithHeadingRow
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

        return new Transfo([

            'id' => $row['id'],
            'poste_id'=> $row['poste_id'],
            'name'=> $row['name'],
            'nivU'=> $row['nivu'],
            'puissance'=> $row['puissance'],
            'numgrte'=> $row['numgrte'],
            'constructeur_id'=> $row['constructeur_id'],
            'datemise'=> $this->transformDate($row['datemise']),
            'etat'=> $row['etat'],
            
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }



}
