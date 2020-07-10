<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodoAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_academicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombre', 100);
            $table->integer('orden');
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
        Schema::dropIfExists('periodo_academicos');
    }
}
