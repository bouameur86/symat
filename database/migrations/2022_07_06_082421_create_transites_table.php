<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('datetime');
            $table->unsignedBigInteger('poste_id');
            $table->string('depart');
            $table->string('tension');
            $table->string('pactif');
            $table->string('qreactif');
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
        Schema::dropIfExists('transites');
    }
}
