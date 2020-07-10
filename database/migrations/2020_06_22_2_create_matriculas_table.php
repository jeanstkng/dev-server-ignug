<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('malla_id');
            $table->foreign('malla_id')->references('id')->on('mallas');
            $table->integer('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->integer('periodo_lectivo_id');
            $table->foreign('periodo_lectivo_id')->references('id')->on('periodo_lectivos');
            $table->integer('periodo_academico_id');
            $table->foreign('periodo_academico_id')->references('id')->on('periodo_academicos');
            $table->integer('tipo_matricula_id');
            $table->foreign('tipo_matricula_id')->references('id')->on('catalogos');
            $table->string('codigo', 50)->nullable();
            $table->dateTime('fecha_matricula')->nullable();
            $table->dateTime('fecha_solicitud')->nullable();
            $table->dateTime('fecha_anulacion')->nullable();
            $table->string('folio', 50)->nullable();
            $table->integer('jornada_principal_id');
            $table->foreign('jornada_principal_id')->references('id')->on('catalogos');
            $table->integer('jornada_operativa_id');
            $table->foreign('jornada_operativa_id')->references('id')->on('catalogos');
            $table->integer('paralelo_principal_id');
            $table->foreign('paralelo_principal_id')->references('id')->on('catalogos');
            $table->decimal('nota_fase_teorica', 5, 2)->nullable();
            $table->decimal('nota_fase_practica', 5, 2)->nullable();
            $table->decimal('nota_final', 5, 2)->nullable();
            $table->string('estado_academico', 20)->nullable();
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
        Schema::dropIfExists('matriculas');
    }
}
