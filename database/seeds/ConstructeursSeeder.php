<?php

use App\Constructeur;
use Illuminate\Database\Seeder;

class ConstructeursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Constructeur::create([
            'name' => 'ABB',
            'Phone' => '021988812',  
            'address' => 'HYDRA Alger 16012',
            ]);

        Constructeur::create([
            'name' => 'SIEMENS',
            'Phone' => '021788812',  
            'address' => 'Oued Semmar Alger 16010',
            ]);
        
        Constructeur::create([
            'name' => 'POWELS',
            'Phone' => '021788812',  
            'address' => 'Rue Didouche mourad - Alger 16010',
            ]);

        Constructeur::create([
            'name' => 'Efacec',
            'Phone' => '021 79 81 07',  
            'address' => 'Bir Khadem Alger 16010',
            ]);

        Constructeur::create([
            'name' => 'TAMINI',
            'Phone' => '021 79 81 07',  
            'address' => 'Bir Khadem Alger 16010',
            ]);

        Constructeur::create([
            'name' => 'Schlumberger',
            'Phone' => '033 51 79 81 07',  
            'address' => 'Paris France Avenue le roi Partik Donis',
            ]);

        Constructeur::create([
            'name' => 'GE',
            'Phone' => '021 79 81 07',  
            'address' => 'Bir Khadem Alger 16010',
            ]);

        Constructeur::create([
            'name' => 'Schneider',
            'Phone' => '021 44 35 09',  
            'address' => 'Bir Khadem Alger 16010',
            ]);

            Constructeur::create([
                'name' => 'VIJAI',
                'Phone' => '021 44 35 09',  
                'address' => 'Hydra Alger 16010',
                ]);

        Constructeur::create([
            'name' => 'Sel',
            'Phone' => '021 44 35 09',  
            'address' => 'Bir Khadem Alger 16010',
            ]);
        
        Constructeur::create([
            'name' => 'HYOSUNG',
            'Phone' => '021 45 88 10', 
            'address' => 'Bir Morad Rais Alger 16010',
            ]);

        Constructeur::create([
            'name' => 'KAHRAKIB',
            'Phone' => '021 88 88 10',  
            'address' => 'Gue de constatine Alger 16010',
            ]);

        Constructeur::create([
            'name' => 'KAHRIF',
            'Phone' => '021 87 86 09',  
            'address' => 'Gue de constatine Alger 16010',
            ]);

    }

}
