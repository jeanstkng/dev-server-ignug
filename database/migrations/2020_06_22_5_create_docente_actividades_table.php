<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_actividades', function (Blueprint $table) {
            $table->id();
            $table->integer('docente_asistencia_id')->nullable();
            $table->foreign('docente_asistencia_id')->references('id')->on('docente_asistencias');
            $table->string('descripcion', 100)->nullable();
            $table->integer('porcentaje_avance')->default(0);
            $table->string('observaciones', 500)->nullable();
            $table->integer('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('catalogos');
            $table->integer('estado_id')->nullable();
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
        Schema::dropIfExists('docente_actividades');
    }
}
