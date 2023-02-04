<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcautosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcautos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poste_id');
            $table->string('fabriq');
            $table->string('finis');
            $table->string('immatri')->unique();
            $table->string('carbu');
            $table->string('propri');
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
        Schema::dropIfExists('parcautos');
    }
}
