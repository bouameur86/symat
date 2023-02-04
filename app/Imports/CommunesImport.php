<?php

namespace App\Imports;
use App\Commune;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class communesImport implements ToModel, WithChunkReading, ShouldQueue ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {

        return new Commune([

            'id' => $row['id'],
            'name'=> $row['name'],
            'wilaya_id'=> $row['wilaya_id'],
            'code'=> $row['code'],            
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }



}
