<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnomalieexpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anomalieexps', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('poste_id');
            $table->string('numes');
            $table->date('dateanom')->format('y/m/d');
            $table->string('equipement');
            $table->string('spequip');
            $table->string('nivU');
            $table->string('typeanom');
            $table->string('anomalie');
            $table->text('descranom');
            $table->string('leon');
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
        Schema::dropIfExists('anomalieexps');
    }
}
