<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('docente_id');
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->integer('periodo_lectivo_id');
            $table->foreign('periodo_lectivo_id')->references('id')->on('periodo_lectivos');
            $table->integer('asignatura_id');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->integer('paralelo_id');
            $table->foreign('paralelo_id')->references('id')->on('catalogos');
            $table->integer('jornada_id');
            $table->foreign('jornada_id')->references('id')->on('catalogos');
            $table->boolean('permiso_p1')->default(true);
            $table->boolean('permiso_p2')->default(true);
            $table->boolean('autoevaluacion')->default(false);
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
        Schema::dropIfExists('docente_asignaturas');
    }
}
