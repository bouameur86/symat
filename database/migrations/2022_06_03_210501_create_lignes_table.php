<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('ste_id');
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('nivU');
            $table->integer('longeur');
            $table->integer('nbrpylone');
            $table->integer('section');
            $table->unsignedBigInteger('constructeur_id')->nullable();
            $table->date('datemise')->format('d/m/Y');
            $table->timestamps();

            $table->foreign('region_id')  
            ->references('id')
            ->on('regions');

            $table->foreign('ste_id')  
            ->references('id')
            ->on('stes');

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
        Schema::dropIfExists('lignes');
    }
}
