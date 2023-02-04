<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poste_id');
            $table->unsignedBigInteger('depart_id');
            $table->unsignedBigInteger('compteur_id'); 
            $table->string('pactifem');
            $table->string('pactifrec');
            $table->string('qreactifem');
            $table->string('qreactifrec');
            $table->string('etat');
            $table->timestamps();

            $table->foreign('poste_id')  
            ->references('id')
            ->on('postes');

            $table->foreign('depart_id')  
            ->references('id')
            ->on('departs');

            $table->foreign('compteur_id')  
            ->references('id')
            ->on('compteurs');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptages');
    }
}
