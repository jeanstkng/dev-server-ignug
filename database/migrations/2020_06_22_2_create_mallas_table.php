<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mallas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('carrera_id');
            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->string('nombre', 100)->nullable();
            $table->date('fecha_aprobacion')->nullable();
            $table->date('fecha_finalizacion')->nullable();
            $table->string('numero_resolucion', 50)->nullable();
            $table->integer('numero_semanas')->nullable();
            $table->integer('periodos_academicos_ordinarios')->nullable();
            $table->integer('total_asignaturas')->nullable();
            $table->integer('total_horas')->nullable();
            $table->integer('total_horas_docencia')->nullable();
            $table->integer('total_horas_practica')->nullable();
            $table->integer('total_horas_practicas_preprofesionales')->nullable();
            $table->integer('total_horas_titulacion')->nullable();
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
        Schema::dropIfExists('mallas');
    }
}
