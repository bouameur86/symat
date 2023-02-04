<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClientsExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Client::all();
    }
    public function headings():array
    {
        return [
                'id',
                'Nom client',
                'poste',
                'depart',
                '(U) client',
        ];
        }

    public function map($client):array
    {
        return [
                $client->id,
                $client->name_client,
                $client->poste->name,
                $client->depart,
                $client->u_client,
        ];
    }

}
