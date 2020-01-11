<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('test_id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->boolean('activo');
            $table->integer('num_preguntas');

            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id')->on('niveles')->references('nivel_id')->onDelete('cascade');

            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id')->on('cargos')->references('cargo_id')->onDelete('cascade');

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
        Schema::dropIfExists('tests');
    }
}
