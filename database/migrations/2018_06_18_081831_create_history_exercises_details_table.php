<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoryExercisesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_exercises_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->string('fecha');
            $table->string('address');
            $table->string('duracion');
            $table->string('status');
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
        Schema::drop('history_exercises_details');
    }
}
