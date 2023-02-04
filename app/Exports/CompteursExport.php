<?php

namespace App\Exports;

use App\Compteur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CompteursExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Compteur::all();
    }

    public function headings():array
    {
        return [
                'id',
                'poste',
                'depart',
                'comp_num',
                'comp_constr',
                'etat',

        ];
        }

    public function map($compteur):array
    {
        return [
                $compteur->id,
                $compteur->poste->name,
                $compteur->depart,
                $compteur->comp_num,
                $compteur->comp_constr, 
                $compteur->etat,
                $compteur->datemise,
        ];
    }

}
