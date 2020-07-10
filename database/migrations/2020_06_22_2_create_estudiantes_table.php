<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->integer('canton_nacimiento_id')->default(0);
            $table->foreign('canton_nacimiento_id')->references('id')->on('ubicaciones');
            $table->integer('tipo_colegio_id');
            $table->foreign('tipo_colegio_id')->references('id')->on('catalogos');
            $table->date('fecha_inicio_carrera')->nullable();
            $table->integer('tipo_bachillerato_id');
            $table->foreign('tipo_bachillerato_id')->references('id')->on('catalogos');
            $table->string('anio_graduacion')->nullable();
            $table->string('cohorte')->nullable();
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
        Schema::dropIfExists('estudiantes');
    }
}
