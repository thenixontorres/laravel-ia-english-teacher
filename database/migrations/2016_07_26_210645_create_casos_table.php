<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecasosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('enunciado');
            $table->integer('evaluacion_id')->unsigned();
            $table->foreign('evaluacion_id')->references('id')->on('evaluacions');
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
        Schema::drop('problemas');
    }
}
