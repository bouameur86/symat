<?php

namespace App\Exports;

use App\Commune;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CommunesExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Commune::all();
    }
    public function headings():array
    {
        return [
                'id',
                'name',
                'wilaya',
                'code',

        ];
        }

    public function map($commune):array
    {
        return [
                $commune->id,
                $commune->name,
                $commune->wilaya->name,
                $commune->code,
        ];
    }

}
