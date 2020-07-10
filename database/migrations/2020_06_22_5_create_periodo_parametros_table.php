<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_parametros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tabla_id')->nullable();
            $table->string('tabla')->nullable();
            $table->integer('periodo_lectivo_id');
            $table->foreign('periodo_lectivo_id')->references('id')->on('periodo_lectivos');
            $table->string('codigo');
            $table->string('nombre');
            $table->integer('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('catalogos');
            $table->string('valor');
            $table->integer('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodo_parametros');
    }
}
