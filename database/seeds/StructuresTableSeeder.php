<?php

use App\Structure;
use Illuminate\Database\Seeder;

class StructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Structure::create([
            'name' => "Direction Générale",
            'code' => 'DG-GRTE',  
            ]);       
       
        Structure::create([
            'name' => "Direction Exploitation",
            'code' => 'DTE/EX',  
            ]);

        Structure::create([
            'name' => "Direction Patrimoine",
            'code' => 'DTE/PAT',  
            ]);
        
        Structure::create([
            'name' => "Direction Maintenance & Travaux",
            'code' => 'DTE/MT',  
            ]);
        
        Structure::create([
            'name' => "Division Exploitation",
            'code' => 'Div/EXP',  
            ]);

        Structure::create([
            'name' => "Division Patrimoine",
            'code' => 'Div/PAT',  
            ]);
        

        Structure::create([
            'name' => "Division Essais et Controle",
            'code' => 'Div/EC',  
            ]);
        
            Structure::create([
                'name' => "Département Méthode & Travaux ",
                'code' => 'Dep/Meth',  
                ]);

        Structure::create([
            'name' => "Division programmation ",
            'code' => 'Div/prog',  

        ]);

        Structure::create([
            'name' => "Service Moyens ",
            'code' => 'Sce/Moy', 
        ]);
        
        Structure::create([
            'name' => "Service de transport  ",
            'code' => 'STE',  
        ]);
        Structure::create([
            'name' => "Division Patrimoine",
            'code' => 'Div/PAT',  
         
            ]);
    }
}
