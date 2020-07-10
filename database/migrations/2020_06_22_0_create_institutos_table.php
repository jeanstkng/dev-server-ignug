<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('institutos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('codigo', 200)->nullable();
            $table->string('nombre', 200);
            $table->string('slogan', 200)->nullable();
            $table->string('url_logo', 250)->nullable();
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
        Schema::dropIfExists('institutos');
    }
}
