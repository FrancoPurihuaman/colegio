<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AREA', function (Blueprint $table) {
            $table->id('ARE_CODIGO');
            $table->string('ARE_NOMBRE', 50);
            $table->string('ARE_DESCRIPCION', 500)->nullable();
            $table->timestamp('ARE_CREATED')->nullable();
            $table->timestamp('ARE_UPDATED')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AREA');
    }
}
