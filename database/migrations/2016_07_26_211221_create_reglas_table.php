<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatereglasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('puntos');
            $table->integer('contexto_id')->unsigned();
            $table->foreign('contexto_id')->references('id')->on('contextos');
            $table->integer('apuntador_id')->unsigned();
            $table->foreign('apuntador_id')->references('id')->on('contextos');
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
        Schema::drop('reglas');
    }
}
