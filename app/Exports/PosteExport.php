<?php

namespace App\Exports;

use App\Poste;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PosteExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Poste::all();
    }
    public function headings():array
    {
        return [
                'id',
                'name',
                'code',
                'nivU',
                'Region',
                'Client CD',
                'STE',
                'Constructeur',
                'Date de MES',

        ];
        }

    public function map($poste):array
    {
        return [
                $poste->id,
                $poste->name,
                $poste->code,
                $poste->nivU,
                $poste->region->code,
                $poste->clientxd,
                $poste->ste->code,
                $poste->constructeur->name,
                $poste->datemise,
        ];
    }

}
