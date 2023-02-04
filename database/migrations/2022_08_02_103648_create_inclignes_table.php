<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInclignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inclignes', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('ligne_id'); 
            $table->dateTime('dateheured');
            $table->dateTime('dateheuref');
            $table->float('dure');
            $table->string('cause');

            $table->string('typeinca');
            $table->string('typeincb');
            $table->string('protpostea')->nullable();
            $table->string('protposteb')->nullable();

            $table->string('phasesa')->nullable();
            $table->string('phasesb')->nullable();
            $table->string('imputation');

            $table->string('stadea')->nullable();
            $table->string('stadeb')->nullable();
            $table->string('ldefa')->nullable();
            $table->string('ldefb')->nullable();

            $table->string('observ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inclignes');
    }
}
