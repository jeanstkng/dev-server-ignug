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
            $table->integer('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('name1', 50);
            $table->string('name2', 50)->nullable();;
            $table->string('last_name1', 50);
            $table->string('last_name2', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('avatar')->nullable();
            $table->string('user_name', 25);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',50);
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

    public function tutor()
    {
        return $this->hasOne('App\Tutor', 'user_id', 'id');
    }

    public function students()
    {
        return $this->hasOne('App\Student', 'user_id', 'id');
    }
}
