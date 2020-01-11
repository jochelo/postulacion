<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos', function (Blueprint $table) {
            $table->bigIncrements('requisito_id');
            $table->string('tipo_documento');
            $table->boolean('activo');

            $table->unsignedBigInteger('nivel_id')->unsigned();
            $table->foreign('nivel_id')->on('niveles')->references('nivel_id')->onDelete('cascade');

            $table->boolean('con_archivo_adjunto')->default(true);

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
        Schema::dropIfExists('requisitos');
    }
}
