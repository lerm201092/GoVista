<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCentroMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_medicos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->string('name');
            $table->string('address');
            $table->text('description');
            $table->string('phone');
            $table->string('email');
            $table->integer('id_empresa');
            $table->integer('id_area');
            $table->string('contact');
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
        Schema::drop('centro_medicos');
    }
}
