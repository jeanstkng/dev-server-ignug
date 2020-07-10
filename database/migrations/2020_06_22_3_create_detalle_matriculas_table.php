<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_matriculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('matricula_id');
            $table->foreign('matricula_id')->references('id')->on('matriculas')->onDelete('cascade');
            $table->integer('asignatura_id');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->integer('tipo_matricula_id');
            $table->foreign('tipo_matricula_id')->references('id')->on('catalogos');
            $table->integer('paralelo_id');
            $table->foreign('paralelo_id')->references('id')->on('catalogos');
            $table->integer('jornada_id');
            $table->foreign('jornada_id')->references('id')->on('catalogos');
            $table->integer('numero_matricula_id');
            $table->foreign('numero_matricula_id')->references('id')->on('catalogos');
            $table->decimal('nota1', 5, 2)->nullable();
            $table->decimal('nota2', 5, 2)->nullable();
            $table->decimal('nota_final', 5, 2)->nullable();
            $table->decimal('asistencia1', 5, 2)->nullable();;
            $table->decimal('asistencia2', 5, 2)->nullable();
            $table->decimal('asistencia_final', 5, 2)->nullable();
            $table->string('estado_academico', 20)->nullable();
            $table->string('estado_evaluacion', 20)->nullable();
            $table->string('observaciones', 20)->nullable();
            $table->string('url_detalle_notas', 20)->nullable();
            $table->integer('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->unique(['matricula_id', 'asignatura_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_matriculas');
    }
}
