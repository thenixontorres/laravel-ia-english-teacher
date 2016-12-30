<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatelogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('puntos');
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->integer('entrada_id')->unsigned();
            $table->foreign('entrada_id')->references('id')->on('entradas');
            $table->integer('respuesta_id')->unsigned();
            $table->foreign('respuesta_id')->references('id')->on('respuestas');
            $table->integer('caso_id')->unsigned();
            $table->foreign('caso_id')->references('id')->on('casos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logs');
    }
}
