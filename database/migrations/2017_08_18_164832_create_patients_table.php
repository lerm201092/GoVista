<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->string('tipodoc');
            $table->string('numdoc');
            $table->string('name1');
            $table->string('name2');
            $table->string('surname1');
            $table->string('surname2');
            $table->string('email');
            $table->string('birthdate');
            $table->string('sex');
            $table->string('id_eps');
            $table->string('address');
            $table->string('phone');
            $table->string('id_area');
            $table->string('zone');
            $table->string('contact_names');
            $table->string('contact_surnames');
            $table->string('contact_phone');
            $table->string('contact_city');
            $table->string('father_name');
            $table->string('father_surname');
            $table->string('father_phone');
            $table->string('father_email');
            $table->string('mother_name');
            $table->string('mother_surname');
            $table->string('mother_phone');
            $table->string('mother_email');
            $table->string('id_empresa');
            $table->string('id_user');
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
        Schema::drop('patients');
    }
}
