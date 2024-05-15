<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ESTUDIANTE', function (Blueprint $table) {
            $table->id('STD_CODIGO');
            $table->string('STD_COD_ESTUDIANTE')->unique();
            $table->string('STD_NOMBRE', 50);
            $table->string('STD_APELLIDO_PAT', 50);
            $table->string('STD_APELLIDO_MAT', 50);
            $table->char('STD_SEXO', 1);
            $table->date('STD_FECHA_NACIMIENTO');
            $table->string('STD_FOTO', 255)->nullable();
            $table->timestamp('STD_CREATED')->nullable();
            $table->timestamp('STD_UPDATED')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ESTUDIANTE');
    }
}
