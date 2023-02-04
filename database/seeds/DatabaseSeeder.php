<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
          /** Seed of Consignation et Trans  */
       // $this->call(BulhebdosTableSeeder::class);
       // $this->call(PlantrasTableSeeder::class);
       // $this->call(ProgconsigsTableSeeder::class);

        /** Seed of incidents & PQS   */
      //  $this->call(EndsTableSeeder::class);
      //  $this->call(IndtrsTableSeeder::class);
       // $this->call(IndligsTableSeeder::class);

         /** Seed of Organismes  */
        
        $this->call(RegionsTableSeeder::class);
        $this->call(StructuresTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        // $this->call(ImputationsTableSeeder::class);
         //$this->call(StesTableSeeder::class);
         $this->call(SiegesTableSeeder::class);
         $this->call(SoussiegesTableSeeder::class);
    
         $this->call(WilayaSeeder::class);
        // $this->call(CommuneSeeder::class);
         //$this->call(SteSeeder::class);

         /** Seed of unites et category  */

        //$this->call(NivtenionsTableSeeder::class);
     //   $this->call(TypeincidentsTableSeeder::class);
       
         /** Seed of unites et category  */
     //   $this->call(AnomaliesTableSeeder::class);

        /** Seed of Ouvrages  */
     //   $this->call(PostesTableSeeder::class);
        //$this->call(InjsTableSeeder::class);
     //   $this->call(CmsTableSeeder::class);

        /** Seed of Sieges  */
        $this->call(ProtectionsSeeder::class);
 
      //  $this->call(TsasTableSeeder::class);
      //  $this->call(DisjoncsTableSeeder::class);
      //  $this->call(TravesTableSeeder::class);
    //    $this->call(BcsTableSeeder::class);
    //    $this->call(TcsTableSeeder::class);
   //     $this->call(TpsTableSeeder::class);
     
         $this->call(UsersTableSeeder::class);
         $this->call(ConstructeursSeeder::class);
         $this->call(LignesTableSeeder::class);
    //     $this->call(PostesTableSeeder::class);
    //   $this->call(TransfosTableSeeder::class);
    }//end of run

}//end of seeder
