<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreaterespuestasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('respuesta');
            $table->integer('regla_id')->unsigned();
            $table->foreign('regla_id')->references('id')->on('reglas');
            $table->integer('reaccion_id')->unsigned();
            $table->foreign('reaccion_id')->references('id')->on('reaccions');
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
        Schema::drop('respuestas');
    }
}
