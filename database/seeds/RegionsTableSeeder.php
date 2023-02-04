<?php

use App\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Region::create([
            'name' => "Direction Générale",
            'code' => 'DG',  
            'phone' => '023255878',
            'address' => '700 Bureau Gue de constantine ',
            ]);

            Region::create([
                'name' => "Région de transport d'electricité Alger",
                'code' => 'DTE/ALG',  
                'phone' => '021845878',
                'address' => 'EL HAMMA ALGER  ',
                ]);

            Region::create([
                'name' => "Région de transport d'electricité Alger Centre",
                'code' => 'DTE/ALG-CNTR',  
                'phone' => '021845478',
                'address' => 'EL HAMMA ALGER ',
                ]);

            Region::create([
                'name' => "Région de transport d'electricité Annaba",
                'code' => 'DTE/AN',  
                'phone' => '0232545878',
                'address' => 'Annaba SI ELHOUASS EL BOUNI',
                ]);

            Region::create([
                'name' => "Région de transport d'electricité Sétif",
                'code' => 'DTE/ST',  
                'phone' => '02184878',
                'address' => 'Alger EL HAMMA',
                ]);

            Region::create([
                'name' => "Région de transport d'electricité Oran",
                'code' => 'DTE/ORN',  
                'phone' => '029818945',
                'address' => "Avenue El Akid Oran",
            ]);

            Region::create([
                'name' => "Région de transport d'electricité Hassi Messaoud",
                'code' => 'DTE/HM',  
                'phone' => '029818945',
                'address' => "Zone d'activité n°2 Bir Messaoud",

                ]);

    }
}
