<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poste_id');
            $table->string('name');
            $table->string('nivU');
            $table->integer('puissance');
            $table->string('numgrte')->unique();
            $table->unsignedBigInteger('constructeur_id')->nullable();
            $table->date('datemise')->format('d/m/Y');
            $table->string('etat');
            $table->timestamps();

            $table->foreign('poste_id')  
            ->references('id')
            ->on('postes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfos');
    }
}
