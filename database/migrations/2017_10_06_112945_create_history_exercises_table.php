<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoryExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_exercises', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_history');
            $table->integer('id_exercice');
            $table->text('observation');
            $table->integer('duration');
            $table->integer('session');
            $table->string('frequency');
            $table->string('screen');
            $table->string('screen_left');
            $table->string('screen_right');
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
        Schema::drop('history_exercises');
    }
}
