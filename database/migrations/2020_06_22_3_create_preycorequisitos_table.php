<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreycorequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preycorequisitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('asignatura_id')->nullable();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->nullable();
            $table->integer('preyco_id')->nullable();
            $table->foreign('preyco_id')->references('id')->on('asignaturas')->nullable();
            $table->integer('tipo');
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
        Schema::dropIfExists('preycorequisitos');
    }
}
