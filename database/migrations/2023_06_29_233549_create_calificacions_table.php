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
            $table->char('CLF_NOTA', 1);
            $table->string('CLF_DESCRIPCION', 500);
            $table->string('CLS_PERIODO_ACADEMICO', 30);
            $table->timestamp('CLF_CREATED')->nullable();
            $table->timestamp('CLF_UPDATED')->nullable();
            $table->unsignedBigInteger('EST_CODIGO');
            $table->unsignedBigInteger('CLS_CODIGO');
            $table->foreign('EST_CODIGO')->references('EST_CODIGO')->on('ESTUDIANTE');
            $table->foreign('CLS_CODIGO')->references('CLS_CODIGO')->on('CLASE');
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
