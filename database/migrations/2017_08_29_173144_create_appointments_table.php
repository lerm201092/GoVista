<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->integer('id_patient');
            $table->string('title');
            $table->string('body');
            $table->integer('id_medico');
            $table->integer('id_empresa');
            $table->string('fullday');
            $table->string('start');
            $table->string('end');
            $table->string('color');
            $table->string('state');
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
        Schema::drop('appointments');
    }
}
