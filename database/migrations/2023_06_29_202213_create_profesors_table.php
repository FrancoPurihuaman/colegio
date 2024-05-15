<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PROFESOR', function (Blueprint $table) {
            $table->id('PFS_CODIGO');
            $table->string('PFS_DNI', 8)->unique();
            $table->string('PFS_NOMBRE', 50);
            $table->string('PFS_APELLIDO_PAT', 50);
            $table->string('PFS_APELLIDO_MAT', 50);
            $table->char('PFS_SEXO', 1);
            $table->date('PFS_FECHA_NACIMIENTO')->nullable();
            $table->string('PFS_EMAIL', 50)->nullable();
            $table->string('PFS_TELEFONO')->nullable();
            $table->string('PFS_ESPECIALIDAD', 50);
            $table->string('PFS_FOTO', 255)->nullable();
            $table->timestamp('PFS_CREATED')->nullable();
            $table->timestamp('PFS_UPDATED')->nullable();
            $table->timestamp('PFS_DELETED')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PROFESOR');
    }
}
