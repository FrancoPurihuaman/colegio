<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CALIFICACION', function (Blueprint $table) {
            $table->id('CLF_CODIGO');
            $table->string('CLF_NOTA', 2);
            $table->string('CLF_DESCRIPCION', 500)->nullable();
            $table->string('CLS_PERIODO_ACADEMICO', 30);
            $table->timestamp('CLF_CREATED')->nullable();
            $table->timestamp('CLF_UPDATED')->nullable();
            $table->unsignedBigInteger('STD_CODIGO');
            $table->unsignedBigInteger('CLS_CODIGO');
            $table->unsignedBigInteger('CPT_CODIGO')->nullable();
            $table->foreign('STD_CODIGO')->references('STD_CODIGO')->on('ESTUDIANTE');
            $table->foreign('CLS_CODIGO')->references('CLS_CODIGO')->on('CLASE');
            $table->foreign('CPT_CODIGO')->references('CPT_CODIGO')->on('COMPETENCIA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CALIFICACION');
    }
}
