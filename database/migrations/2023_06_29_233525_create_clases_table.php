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
            $table->timestamp('CLS_CREATED')->nullable();
            $table->timestamp('CLS_UPDATED')->nullable();
            $table->unsignedBigInteger('GRP_CODIGO');
            $table->unsignedBigInteger('ARE_CODIGO');
            $table->unsignedBigInteger('PFS_CODIGO');
            $table->foreign('GRP_CODIGO')->references('GRP_CODIGO')->on('GRUPO');
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
