<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('codigo_padre_id')->nullable();
            $table->foreign('codigo_padre_id')->references('id')->on('ubicaciones')->nullable();
            $table->string('codigo', 50);
            $table->string('nombre', 100);
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
        Schema::dropIfExists('ubicaciones');
    }
}
