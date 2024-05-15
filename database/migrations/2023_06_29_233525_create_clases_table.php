<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CLASE', function (Blueprint $table) {
            $table->id('CLS_CODIGO');
            $table->char('CLS_GRADO', 1);
            $table->char('CLS_SECCION', 1);
            $table->integer('CLS_YEAR');
            $table->timestamp('CLS_CREATED')->nullable();
            $table->timestamp('CLS_UPDATED')->nullable();
            $table->unsignedBigInteger('ARE_CODIGO');
            $table->unsignedBigInteger('PFS_CODIGO');
            $table->foreign('ARE_CODIGO')->references('ARE_CODIGO')->on('AREA');
            $table->foreign('PFS_CODIGO')->references('PFS_CODIGO')->on('PROFESOR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CLASE');
    }
}
