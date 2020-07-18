<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-ignug')->create('careers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('institution_id');
            $table->foreign('institution_id')->references('id')->on('institutions');
            $table->string('code', 50)->nullable();;
            $table->string('name', 200);
            $table->string('description', 200);
            $table->bigInteger('modality_id');
            $table->foreign('modality_id')->references('id')->on('catalogues');
            $table->string('numero_resolucion', 150)->nullable();
            $table->string('title', 200);
            $table->string('acronym', 50);
            $table->integer('type_id');
            $table->foreign('type_id')->references('id')->on('catalogues');
            $table->bigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::connection('pgsql-ignug')->dropIfExists('careers');
    }
}
