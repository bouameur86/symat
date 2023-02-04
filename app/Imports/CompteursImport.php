<?php

namespace App\Imports;
use App\Compteur;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompteursImport implements ToModel, WithChunkReading, ShouldQueue ,WithHeadingRow
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

        return new Compteur([

            'id' => $row['id'],
            'poste_id'=> $row['poste_id'],
            'depart'=> $row['depart'],
            'compt_num'=> $row['compt_num'],
            'compt_constr'=> $row['compt_constr'],
            'etat'=> $row['etat'],
            'datemise'=> $this->transformDate($row['datemise']),
            
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }



}
