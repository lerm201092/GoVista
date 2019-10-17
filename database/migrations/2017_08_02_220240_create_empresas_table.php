<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id');
            $table->string('nit');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->integer('id_area');
            $table->string('contacto');
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
        Schema::drop('empresas');
    }
}
