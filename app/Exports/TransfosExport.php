<?php

namespace App\Exports;

use App\Poste;
use App\Transfo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransfosExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transfo::all();
    }
    public function headings():array
    {
        return [
                'id',
                'poste',
                'name', 
                'nivU',
                'puissance',
                'numgrte',
                'Constructeur',
                'Date de MES',
                'etat',

        ];
        }

    public function map($transfo):array
    {
        return [
                $transfo->id,
                $transfo->poste->name,  
                $transfo->name,
                $transfo->nivU,
                $transfo->puissance,
                $transfo->numgrte,
                $transfo->constructeur->name,
                $transfo->datemise,
                $transfo->etat, 
        ];
    }

}
