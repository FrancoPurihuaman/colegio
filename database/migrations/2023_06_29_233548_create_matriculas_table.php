<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MATRICULA', function (Blueprint $table) {
            $table->id('MTL_CODIGO');
            $table->timestamp('MTL_CREATED')->nullable();
            $table->timestamp('MTL_UPDATED')->nullable();
            $table->unsignedBigInteger('CLS_CODIGO');
            $table->unsignedBigInteger('STD_CODIGO');
            $table->foreign('CLS_CODIGO')->references('CLS_CODIGO')->on('CLASE');
            $table->foreign('STD_CODIGO')->references('STD_CODIGO')->on('ESTUDIANTE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MATRICULA');
    }
}
