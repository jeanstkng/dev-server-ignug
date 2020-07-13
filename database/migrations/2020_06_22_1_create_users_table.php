<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->integer('etnia_id')->nullable();
            $table->foreign('etnia_id')->references('id')->on('catalogos');
            $table->integer('pueblo_nacionalidad_id')->nullable();
            $table->foreign('pueblo_nacionalidad_id')->references('id')->on('catalogos');
            $table->integer('tipo_identificacion_id')->nullable();
            $table->foreign('tipo_identificacion_id')->references('id')->on('catalogos');
            $table->string('identificacion', 20);
            $table->string('nombre1', 50);
            $table->string('nombre2', 50)->nullable();;
            $table->string('apellido1', 50);
            $table->string('apellido2', 50)->nullable();
            $table->integer('sexo_id')->nullable();
            $table->foreign('sexo_id')->references('id')->on('catalogos');
            $table->integer('genero_id')->nullable();
            $table->foreign('genero_id')->references('id')->on('catalogos');
            $table->string('correo_personal', 50)->nullable()->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('tipo_sangre_id')->nullable();
            $table->foreign('tipo_sangre_id')->references('id')->on('catalogos');
            $table->string('avatar')->nullable();
            $table->string('user_name', 25);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->integer('estado_id')->nullable();;
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
