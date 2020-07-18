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
        Schema::connection('pgsql-authentication')->create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('etnia_id')->nullable();
            $table->foreign('etnia_id')->references('id')->on('ignug.catalogues');
            $table->integer('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('ignug.catalogues');
            $table->integer('identification_type_id');
            $table->foreign('identification_type_id')->references('id')->on('ignug.catalogues');
            $table->string('identification', 20);
            $table->string('first_name', 50);
            $table->string('second_name', 50)->nullable();
            $table->string('first_lastname', 50);
            $table->string('second_lastname', 50)->nullable();
            $table->integer('sex_id')->nullable();
            $table->foreign('sex_id')->references('id')->on('ignug.catalogues');
            $table->integer('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('ignug.catalogues');
            $table->string('personal_email', 50)->nullable()->unique();
            $table->date('birthday')->nullable();
            $table->integer('blood_type_id')->nullable();
            $table->foreign('blood_type_id')->references('id')->on('ignug.catalogues');
            $table->string('user_name', 25);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->foreignId('state_id')->constrained();
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
        Schema::connection('pgsql-authentication')->dropIfExists('users');
    }
}
