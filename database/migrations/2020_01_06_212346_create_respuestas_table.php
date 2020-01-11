<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->bigIncrements('respuesta_id');
            $table->string('respuesta_descripcion');
            $table->boolean('correcto');

            $table->unsignedBigInteger('pregunta_id');
            $table->foreign('pregunta_id')->on('preguntas')->references('pregunta_id')->onDelete('cascade');

            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('respuestas');
    }
}
