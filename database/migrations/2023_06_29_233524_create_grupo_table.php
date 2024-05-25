<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GRUPO', function (Blueprint $table) {
            $table->id('GRP_CODIGO');
            $table->String('GRP_YEAR_ACADEMICO', 20);
            $table->string('GRP_SECCION', 20);
            $table->String('GRP_PERIODO_EVALUACION', 20);
            $table->String('GRP_CANT_PERIODOS_EVAL', 20);
            $table->timestamp('GRP_CREATED')->nullable();
            $table->timestamp('GRP_UPDATED')->nullable();
            $table->unsignedBigInteger('GRD_CODIGO');
            $table->foreign('GRD_CODIGO')->references('GRD_CODIGO')->on('GRADO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GRUPO');
    }
}
