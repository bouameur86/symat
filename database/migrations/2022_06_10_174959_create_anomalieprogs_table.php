<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateanomalieprogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anomalieprogs', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('numes');
            $table->date('dateanom')->format('d/m/Y');
            $table->unsignedBigInteger('poste_id')->nullable(); 
            $table->string('equipement');
            $table->string('spequip');
            $table->string('nivU');
            $table->string('typeanom');
            $table->string('anomalie');
            $table->string('descranom');
            $table->string('travef');
            $table->string('causnol');
            $table->string('leon');
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
        Schema::dropIfExists('anomalieprogs');
    }
}
