<?php

use App\Region;
use App\Structure;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'super',
            'last_name' => 'admin',
            'fonction' => "ingénieur d'Etudes",
            'region_id' => Region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,
            'structure_id' => Structure::where('name' , "Division Exploitation")->first()->id,
            'image' => 'images/user_images/default.png',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456'),
        ]);

        $user->attachRole('super_admin');

        $user1 = User::create([
            'first_name' => 'YOUCEFI ',
            'last_name' => 'Nabil',
            'fonction' => "PDG du filialle GRTE.Spa",
            'region_id' => Region::where('name' , "Direction Générale")->first()->id,
            'structure_id' => Structure::where('name' , "Direction Générale")->first()->id,
            'image' => 'images/user_images/bouameuromar.png',
            'email' => 'youcefi.nabil@grte.dz',
            'password' => bcrypt('Nabily@22'),
        ]);
        $user1->attachRole('admin');

        $user2 = User::create([
            'first_name' => 'BOUAMEUR',
            'last_name' => 'Omar',
            'fonction' => "ingénieur d'Etudes",
            'region_id' => Region::where('name' , "Région de transport d'electricité Hassi Messaoud")->first()->id,
            'structure_id' => Structure::where('name' , "Division Exploitation")->first()->id,
            'image' => 'images/user_images/bouameuromar.png',
            'email' => 'bouameur.omar@grte.dz',
            'password' => bcrypt('123456'),
        ]);

        $user2->attachRole('admin');

        $user3 = User::create([
            'first_name' => 'SAHLI',
            'last_name' => 'Mokhtar',
            'fonction' => "Chef Département Exploitation",
            'region_id' => Region::where('name' , "Direction Générale")->first()->id,
            'structure_id' => Structure::where('name' , "Direction Exploitation")->first()->id,
            'image' => 'images/user_images/bouameuromar.png',
            'email' => 'sahli.mokhtar@grte.dz',
            'password' => bcrypt('Mokhtar@22'),
        ]);

        $user3->attachRole('admin');

        $user4 = User::create([
            'first_name' => 'BELLILI',
            'last_name' => 'BACHIR',
            'fonction' => "Ingénieur d'Etudes",
            'region_id' => Region::where('name' , "Direction Générale")->first()->id,
            'structure_id' => Structure::where('name' , "Direction Exploitation")->first()->id,
            'image' => 'images/user_images/bouameuromar.png',
            'email' => 'bellili.bachir@grte.dz',
            'password' => bcrypt('Bachir@22'),
        ]);

        $user4->attachRole('admin');
    
        $user5 = User::create([
            'first_name' => 'BELMEKHTAR',
            'last_name' => 'BOUALAM',
            'fonction' => "Ingénieur d'Etudes",
            'region_id' => Region::where('name' , "Direction Générale")->first()->id,
            'structure_id' => Structure::where('name' , "Direction Exploitation")->first()->id,
            'image' => 'images/user_images/bouameuromar.png',
            'email' => 'belmokhtar.boualam@grte.dz',
            'password' => bcrypt('Mokhtar@22'),
        ]);

        $user5->attachRole('admin');

    }//end of run

}//end of seeder
