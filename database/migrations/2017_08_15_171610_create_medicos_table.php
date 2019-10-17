<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->string('name');
            $table->string('address');
            $table->string('specialty');
            $table->string('phone');
            $table->string('email');
            $table->integer('id_empresa');
            $table->integer('id_area');
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
        Schema::drop('medicos');
    }
}
