<?php

use App\Region;
use App\Commune;
use App\Ste;
use Illuminate\Database\Seeder;

class SteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
        Ste::create([
            'name'=>'Service transport électricité Hassi Messaoud',
            'code'=>'STE/HM',
            'commune_id' => Commune::where('name' , 'Hassi Messaoud')->first()->id,
            'region_id' => region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,
            'address'=>'dfgqdsfrgerg',
       
        ]);

        Ste::create([
            'name'=>'Service transport électricité Touggourt',
            'code'=>'STE/HM',
            'commune_id' => Commune::where('name' , 'Touggourt')->first()->id,
            'region_id' => region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,
            'address'=>'dfgqdsfrgerg',
       
        ]);

        Ste::create([
            'name'=> "Service transport électricité Hassi r'mel",
            'code'=>'STE/HR',
            'commune_id' => Commune::where('name' , 'LAGHOUAT')->first()->id,
            'region_id' => region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,
            'address'=>'Laghouat Ville 3015',
       
        ]);

        Ste::create([
            'name'=> "Service transport électricité Hassi Berkin",
            'code'=>'STE/HABER',
            'commune_id' => Commune::where('name' , 'Ouargla')->first()->id,
            'region_id' => region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,
            'address'=>'Laghouat Ville 3015',
       
        ]);

        Ste::create([
            'name'=>'Service transport électricité Adrar',
            'code'=>'STE/ADRAR',
            'commune_id' => Commune::where('name' , 'Adrar')->first()->id,
            'region_id' => region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,
            'address'=>'dfgqdsfrgerg',
       
        ]);

    }
    
}
