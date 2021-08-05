<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefaultUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('salt');
            $table->integer('group_id');
            $table->string('ip_address');
            $table->integer('active');
            $table->string('activation_code');
            $table->integer('created_on');
            $table->dateTime('last_login');
            $table->string('username');
            $table->string('forgotten_password_code');
            $table->string('remember_code');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_users');
    }
}
