<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_asistencias', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('fecha');
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
        Schema::dropIfExists('docente_asistencias');
    }
}
