<?php

use App\Poste;
use App\Transfo;
use Illuminate\Database\Seeder;

class TransfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Transfo::create([
            'poste_id' => Poste::where('name', 'ROUISSAT')->first()->id,  
            'name' => 'TR n°1',  
            'nivU' => '220/60',
            'puissance' => '120 Mva',
            'numgrte' => '125488',
            'constructeur' => 'Efacec',
            'datemise' => '2005-06-15',
            'etat' => 'En service',
            ]); 
          
        Transfo::create([
            'poste_id' => Poste::where('name' , 'Ouargla')->first()->id,  
            'name' => 'TR n°2',  
            'nivU' => '220/60',
            'puissance' => '120',
            'numgrte' => '125484',
            'constructeur' => 'Efacec',
            'datemise' => '2005-06-15',
            'etat' => 'En service',
            ]); 
            
            Transfo::create([
                'poste_id' => Poste::where('name' , 'Ouargla')->first()->id,  
                'name' => 'TR n°3',  
                'nivU' => '60/30',
                'puissance' => '40',
                'numgrte' => '78584',
                'constructeur' => 'Efacec',
                'datemise' => '2005-06-15',
                'etat' => 'En service',
                ]); 
    
    }//end of run

}

//end of seeder