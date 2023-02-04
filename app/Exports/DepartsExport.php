<?php

namespace App\Exports;

use App\Depart;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DepartsExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Depart::all();
    }
    public function headings():array
    {
        return [
                'id',
                'poste',
                'name',
                'nivU',
                'etat',
        ];
        }

    public function map($depart):array
    {
        return [
                $depart->id,
                $depart->poste->name,
                $depart->name,
                $depart->nivU,
                $depart->etat,
        ];
    }

}
