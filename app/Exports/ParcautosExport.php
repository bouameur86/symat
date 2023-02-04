<?php

namespace App\Exports;

use App\Poste;
use App\Parcauto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ParcautosExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Parcauto::all();
    }
    public function headings():array
    {
        return [
                'id',
                'poste',
                'fabri', 
                'finis',
                'immat',
                'carbur',
                'propri',
                'Date de MES',
                'etat',

        ];
        }

    public function map($parcauto):array
    {
        return [
                $parcauto->id,
                $parcauto->poste->name,  
                $parcauto->name,
                $parcauto->nivU,
                $parcauto->puissance,
                $parcauto->numgrte,
                $parcauto->constructeur->name,
                $parcauto->datemise,
                $parcauto->etat, 
        ];
    }

}
