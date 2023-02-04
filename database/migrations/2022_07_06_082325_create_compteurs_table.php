<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poste_id');
            $table->string('depart');
            $table->string('comp_num');
            $table->string('comp_constr');
            $table->string('etat');
            $table->date('datemise')->format('Y/m/d');;
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
        Schema::dropIfExists('compteurs');
    }
}
