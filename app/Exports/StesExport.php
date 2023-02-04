<?php

namespace App\Exports;

use App\Ste;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StesExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ste::all();
    }
    public function headings():array
    {
        return [
                'id',
                'name',
                'code',
                'commune',
                'region',
                'address',

        ];
        }

    public function map($ste):array
    {
        return [
                $ste->id,
                $ste->name,
                $ste->code,
                $ste->commune->name,
                $ste->region->name, 
                $ste->address,
        ];
    }

}
