<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poste_id')->nullable(); 
            $table->string('numtr');
            $table->string('nivU');
            $table->string('cause');
            $table->string('evenement');
            $table->string('incident');
            $table->string('protection'); 
            $table->dateTime('dateheured');
            $table->dateTime('dateheuref');
            $table->float('dure');
            $table->string('pcoupe');
            $table->string('energie');
            $table->string('imputation');
            $table->string('ouvcause');
            $table->string('saifi');
            $table->time('saidi');
            $table->dateTime('dhretour');
            $table->time('indispo');
            $table->string('mgmp');
            $table->timestamps();


            $table->foreign('poste_id')  
                      ->references('id')
                      ->on('postes')
                      ->onDelete('set null');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ends');
    }
}
