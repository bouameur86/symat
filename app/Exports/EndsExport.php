<?php

namespace App\Exports;

use App\End;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EndsExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return End::all();
    }
    public function headings():array
    {
        return [
                'id',
                'region',
                'poste',
                'Client CD',
                'TR n°',
                'nivU',
                'cause',
                'siège incid',
                'INC',
                'Protection',
                'Date H Début',
                'Date H Fin',
                'SAIDI',
                'PC',
                'end',
                'ouvcause',
                'imputation',
                'saifi',


        ];
        }

    public function map($end):array
    {
        return [
                $end->id,
                $end->poste->region,
                $end->poste->name,
                $end->poste->clientxd,
                $end->numtr,
                $end->nivU,
                $end->cause,
                $end->evenement,
                $end->incident,
                $end->protection,
                $end->dateheured,
                $end->dateheured,
                $end->saidi,
                $end->pcoupe,
                $end->energie,
                $end->ouvcause,
                $end->imputation,
                $end->saifi,
        ];
    }

}
