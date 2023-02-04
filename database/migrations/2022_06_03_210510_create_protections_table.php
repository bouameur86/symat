<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poste_id')->nullable(); 
            $table->string('code_prot');
            $table->string('name_prot');
            $table->string('fonct');
            $table->unsignedBigInteger('constructeur_id');
            $table->date('datemise')->format('Y/m/d');
            $table->string('etat');
            $table->timestamps();


            $table->foreign('poste_id')  
            ->references('id')
            ->on('postes');

            $table->foreign('constructeur_id')  
            ->references('id')
            ->on('constructeurs');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protections');
    }
}
