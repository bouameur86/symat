<?php

namespace App\Imports;
use App\Depart;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DepartsImport implements ToModel, WithChunkReading, ShouldQueue ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

 
    public function model(array $row)
    {

        return new Depart([

            'id' => $row['id'],
            'poste_id'=> $row['poste_id'],
            'name'=> $row['name'],
            'nivU'=> $row['nivu'],
            'etat'=> $row['etat'],
            
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }



}
