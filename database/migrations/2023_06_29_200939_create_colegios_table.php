<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('COLEGIO', function (Blueprint $table) {
            $table->id('CLG_CODIGO');
            $table->string('CLG_CODIGO_MODULAR', 20);
            $table->string('CLG_NOMBRE', 100);
            $table->string('CLG_DIRECTOR', 100);
            $table->string('CLG_LOGO', 255)->nullable();
            $table->timestamp('CLG_CREATED')->nullable();
            $table->timestamp('CLG_UPDATED')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('COLEGIO');
    }
}
