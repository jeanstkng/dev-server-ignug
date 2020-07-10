<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('instituto_id');
            $table->foreign('instituto_id')->references('id')->on('institutos');
            $table->string('codigo', 50)->nullable();;
            $table->string('nombre', 200);
            $table->string('descripcion', 200);
            $table->integer('modalidad_id');
            $table->foreign('modalidad_id')->references('id')->on('catalogos');
            $table->string('numero_resolucion', 50)->nullable();
            $table->string('titulo_otorga', 200);
            $table->string('siglas', 50);
            $table->integer('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('catalogos');
            $table->integer('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
}
