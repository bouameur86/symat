<?php

namespace App\Imports;
use App\End;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EndsImport implements ToModel, WithChunkReading, ShouldQueue ,WithHeadingRow
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

        return new End([

            'id' => $row['id'],
            'poste_id'=> $row['poste_id'],
            'numtr'=> $row['numtr'],
            'nivU'=> $row['nivU'],
            'cause'=> $row['cause'],
            'evenement'=> $row['evenement'],
            'incident'=> $row['incident'],
            'protection'=> $row['protection'],
            'dateheured'=>  $this->transformDate($row['dateheured']),
            'dateheuref'=>  $this->transformDate($row['dateheuref']), 
            'protection'=> $row['dure'],
            'protection'=> $row['pcoupe'],
            'protection'=> $row['energie'],
            'protection'=> $row['imputation'],
            'protection'=> $row['ouvcause'],
            'protection'=> $row['saifi'],
            'protection'=> $row['saidi'],
            'dateheuref'=>  $this->transformDate($row['dhretour']),
            'protection'=> $row['indispo'],
            'protection'=> $row['mgmp'],
            
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }



}
