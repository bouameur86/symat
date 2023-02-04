<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cliname');
            $table->unsignedBigInteger('poste_id');
            $table->string('depart');
            $table->string('uclient');
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
        Schema::dropIfExists('clients');
    }
}
