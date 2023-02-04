<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->string('code'); 
            $table->unsignedBigInteger('commune_id')->unique(); 
            $table->unsignedBigInteger('region_id'); 
            $table->string('address'); 
            $table->timestamps();

            $table->foreign('commune_id')  
                      ->references('id')
                      ->on('communes');

            $table->foreign('region_id')  
                      ->references('id')
                      ->on('regions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stes');
    }
}
