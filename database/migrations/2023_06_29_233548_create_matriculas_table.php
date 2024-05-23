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
            $table->string('MTL_TUTOR', 100);
            $table->timestamp('MTL_CREATED')->nullable();
            $table->timestamp('MTL_UPDATED')->nullable();
            $table->unsignedBigInteger('STD_CODIGO');
            $table->unsignedBigInteger('GRP_CODIGO');
            $table->foreign('STD_CODIGO')->references('STD_CODIGO')->on('ESTUDIANTE');
            $table->foreign('GRP_CODIGO')->references('GRP_CODIGO')->on('GRUPO');
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
