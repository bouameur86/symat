<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('region_id');
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('nivU');
            $table->unsignedBigInteger('ste_id')->nullable();
            $table->string('clientxd');
            $table->unsignedBigInteger('constructeur_id')->nullable();
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->date('datemise')->format('Y/m/d');
            $table->timestamps();

            $table->foreign('region_id')  
            ->references('id')
            ->on('regions');

            $table->foreign('ste_id')  
            ->references('id')
            ->on('stes');

            $table->foreign('constructeur_id')  
            ->references('id')
            ->on('constructeurs')
            ->onDelete('set null');

            $table->foreign('commune_id')  
            ->references('id')
            ->on('communes')
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
        Schema::dropIfExists('postes');
    }
}
