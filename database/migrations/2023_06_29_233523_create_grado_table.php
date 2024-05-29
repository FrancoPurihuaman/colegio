<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GRADO', function (Blueprint $table) {
            $table->id('GRD_CODIGO');
            $table->string('GRD_NOMBRE', 20);
            $table->string('GRD_DESCRIPCION', 255)->nullable();
            $table->timestamp('GRD_CREATED')->nullable();
            $table->timestamp('GRD_UPDATED')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GRADO');
    }
}
