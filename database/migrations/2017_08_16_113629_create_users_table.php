<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('tipodoc');
            $table->string('numdoc');
            $table->string('address');
            $table->integer('id_area');
            $table->string('roluser');
            $table->string('movil');
            $table->string('estado');
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
        Schema::drop('users');
    }
}
