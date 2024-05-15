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
            $table->string('CLF_DESCRIPCION', 250);
            $table->string('CLS_PERIODO_ACADEMICO', 30);
            $table->string('CLS_OBSERVACION', 500);
            $table->timestamp('CLF_CREATED')->nullable();
            $table->timestamp('CLF_UPDATED')->nullable();
            $table->unsignedBigInteger('MTL_CODIGO');
            $table->unsignedBigInteger('CPT_CODIGO');
            $table->foreign('MTL_CODIGO')->references('MTL_CODIGO')->on('MATRICULA');
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
