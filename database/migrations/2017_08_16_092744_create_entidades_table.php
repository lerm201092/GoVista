<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->string('code');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->integer('id_area');
            $table->string('contact');
            $table->string('estado');
            $table->string('tipo');
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
        Schema::drop('entidades');
    }
}
