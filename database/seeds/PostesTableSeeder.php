<?php

use App\Commune;
use App\Constructeur;
use App\Region;
use App\Poste;
use App\Ste;
use Illuminate\Database\Seeder;

class PostesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Poste::create([
            'region_id' => Region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,  
            'name' => 'Hassi Messaoud',
            'code' => 'HAMED',  
            'nivU' => '400/220',
            'ste_id' => Ste::where('name' , 'Service transport électricité Hassi Messaoud')->first()->id,  
            'clientxd' => 'RDC',
            'constructeur_id'=> Constructeur::where('name','SIEMENS')->first()->id,
            'commune_id'=> Commune::where('name','Hassi Messaoud')->first()->id,  
            'datemise' => '2014-11-25',

            ]); 
  
        Poste::create([
            'region_id' => Region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,  
            'name' => 'Hassi Messaoud Ouest',
            'code' => 'HAMEO',  
            'nivU' => '220',
            'ste_id' => Ste::where('name' , 'Service transport électricité Hassi Messaoud')->first()->id,  
            'clientxd' => 'RDC',
            'constructeur_id'=> Constructeur::where('name','SIEMENS')->first()->id,
            'commune_id'=> Commune::where('name','Hassi Messaoud')->first()->id,  
            'datemise' => '2004-07-05',

            ]);
        
        Poste::create([
            'region_id' => Region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,  
            'name' => 'Hassi Messaoud Nord',
            'code' => 'HAMEN',  
            'nivU' => '220/60/30',
            'ste_id' => Ste::where('name' , 'Service transport électricité Hassi Messaoud')->first()->id,  
            'clientxd' => 'RDC',
            'constructeur_id'=> Constructeur::where('name','SIEMENS')->first()->id, 
            'commune_id'=> Commune::where('name','Hassi Messaoud')->first()->id,  
            'datemise' => '1978-06-18',

            ]);

            Poste::create([
                'region_id' => Region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,  
                'name' => 'BELHIRANE',
                'code' => 'BELHI',  
                'nivU' => '220/30',
                'ste_id' => Ste::where('name', 'Service transport électricité Hassi Messaoud')->first()->id,  
                'clientxd' => 'RDC',
                'constructeur_id'=> Constructeur::where('name','SIEMENS')->first()->id, 
                'commune_id'=> Commune::where('name','Hassi Messaoud')->first()->id,  
                'datemise' => '2003-10-05',
    
                ]);

            Poste::create([
                'region_id' => Region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,  
                'name' => 'OUARGLA',
                'code' => 'OUARG',  
                'nivU' => '220/60/30',
                'ste_id' => Ste::where('name', 'Service transport électricité Hassi Messaoud')->first()->id,  
                'clientxd' => 'RDC',
                'constructeur_id'=> Constructeur::where('name','SIEMENS')->first()->id,
                'commune_id'=> Commune::where('name','Hassi Messaoud')->first()->id,  
                'datemise' => '2004-06-15',
    
                ]);    

            Poste::create([
                'region_id' => Region::where('name', "Région de transport d'electricité Hassi Messaoud")->first()->id,  
                'name' => 'OUARGLA EST',
                'code' => 'OUAES', 
                'nivU' => '220/60/30',
                'ste_id' => Ste::where('name', 'Service transport électricité Hassi Messaoud')->first()->id,  
                'clientxd' => 'RDC',
                'constructeur_id'=> Constructeur::where('name','SIEMENS')->first()->id,
                'commune_id'=> Commune::where('name','Hassi Messaoud')->first()->id,  
                'datemise' => '2019-11-15',
    
                ]);    

            Poste::create([
                'region_id' => Region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,  
                'name' => 'ROUISSAT',
                'code' => 'ROUIS',  
                'nivU' => '60/30',
                'ste_id' => Ste::where('name', 'Service transport électricité Hassi Messaoud')->first()->id,  
                'clientxd' => 'RDC',
                'constructeur_id'=> Constructeur::where('name','SIEMENS')->first()->id,
                'commune_id'=> Commune::where('name','Hassi Messaoud')->first()->id,  
                'datemise' => '2010-07-05',
    
                ]);    

         

    }//end of run

}

//end of seeder