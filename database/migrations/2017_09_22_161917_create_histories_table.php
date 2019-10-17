<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->string('historydate');
            $table->integer('id_empresa');
            $table->integer('id_medico');
            $table->string('id_centromedico');
            $table->integer('id_patient');
            $table->string('amb_organic');
            $table->string('amb_functional');
            $table->string('fixation');
            $table->string('treatment');
            $table->string('affected_eye');
            $table->string('pupils');
            $table->string('respond_to');
            $table->string('pupil_exam');
            $table->string('visual_acuity');
            $table->integer('intpup_dist_left');
            $table->integer('intpup_dist_right');
            $table->integer('pupil_size_left');
            $table->integer('pupil_size_right');
            $table->integer('spher_equiv_left');
            $table->integer('spher_equiv_right');
            $table->integer('cylinder_left');
            $table->integer('cylinder_right');
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
        Schema::drop('histories');
    }
}
