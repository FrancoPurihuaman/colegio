<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TIPO_USUARIO', function (Blueprint $table) {
            $table->id('TPU_CODIGO');
            $table->string('TPU_NOMBRE', 20);
            $table->timestamp('TPU_CREATED')->nullable();
            $table->timestamp('TPU_UPDATED')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TIPO_USUARIO');
    }
}
