<?php

namespace App\Imports;
use App\Ste;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StesImport implements ToModel, WithChunkReading, ShouldQueue ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {

        return new Ste([

            'id' => $row['id'],
            'name'=> $row['name'],
            'code'=> $row['code'],
            'commune_id'=> $row['commune_id'],
            'region_id'=> $row['region_id'],
            'address'=> $row['code'],            
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }



}
