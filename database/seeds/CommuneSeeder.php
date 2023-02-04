<?php

use App\Wilaya;
use App\Commune;
use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commune::create([
            'name'=>'Ouargla',
            'wilaya_id' => Wilaya::where('name' , 'OUARGLA')->first()->id,
            'code'=>'30016',
    
            ]);   
        
        Commune::create([
            'name'=>'Touggourt',
            'wilaya_id' => Wilaya::where('name' , 'TOUGGOURT')->first()->id,
            'code'=>'55001',
    
            ]);        
        
        Commune::create([
            'name'=>'Adrar',
            'wilaya_id' => Wilaya::where('name' , 'ADRAR')->first()->id,
            'code'=>'101',
    
            ]);
       
        Commune::create([
            'name'=>'Hassi Messaoud',
            'wilaya_id' => Wilaya::where('name' , 'OUARGLA')->first()->id,
            'code'=>'30101',
    
            ]);
        
        Commune::create([
            'name'=>'Laghouat',
            'wilaya_id' => Wilaya::where('name' , 'LAGHOUAT')->first()->id,
            'code'=>'3101',
    
            ]);
        
        Commune::create([
        'name'=>'ROUISSAT',
        'wilaya_id' => Wilaya::where('name' , 'OUARGLA')->first()->id,
        'code'=>'30301',

        ]);
  

    }
    
}
