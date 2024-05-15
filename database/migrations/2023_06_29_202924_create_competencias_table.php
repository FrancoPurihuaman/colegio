<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('COMPETENCIA', function (Blueprint $table) {
            $table->id('CPT_CODIGO');
            $table->string('CPT_NOMBRE', 255);
            $table->string('CPT_DESCRIPCION', 2000)->nullable();
            $table->timestamp('CPT_CREATED')->nullable();
            $table->timestamp('CPT_UPDATED')->nullable();
            $table->unsignedBigInteger('ARE_CODIGO');
            $table->foreign('ARE_CODIGO')->references('ARE_CODIGO')->on('AREA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('COMPETENCIA');
    }
}
