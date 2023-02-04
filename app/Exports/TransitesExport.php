<?php

namespace App\Exports;

use App\Transite;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransitesExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transite::all();
    }
    public function headings():array
    {
        return [
                'id',
                'datetime',
                'poste',
                'depart',
                'tension',
                'pactif',
                'qreactif',
        ];
        }

    public function map($transite):array
    {
        return [
                $transite->id,
                $transite->datetime,
                $transite->poste->name,
                $transite->depart,
                $transite->tension,
                $transite->pactif,
                $transite->qreactif,
        ];
    }

}
