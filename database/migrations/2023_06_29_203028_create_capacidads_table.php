<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CAPACIDAD', function (Blueprint $table) {
            $table->id('CPC_CODIGO');
            $table->string('CPC_DESCRIPCION', 2000);
            $table->timestamp('CPC_CREATED')->nullable();
            $table->timestamp('CPC_UPDATED')->nullable();
            $table->unsignedBigInteger('CPT_CODIGO');
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
        Schema::dropIfExists('CAPACIDAD');
    }
}
