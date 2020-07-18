<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-ignug')->create('tasks', function (Blueprint $table) {
            $table->id();
            $table->morphs('taskable');
            $table->string('description', 200)->nullable();
            $table->integer('percentage_advance')->default(0);
            $table->string('observations', 500)->nullable();
            $table->integer('type_id');
            $table->foreign('type_id')->references('id')->on('catalogues');
            $table->integer('state_id');
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
        Schema::connection('pgsql-ignug')->dropIfExists('tasks');
    }
}
