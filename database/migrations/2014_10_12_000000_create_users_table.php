<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('numero_carnet');
            $table->string('expedicion');
            $table->string('foto_carnet');

            $table->string('estado_civil');
            $table->date('fecha_nacimiento');
            $table->string('lugar');
            $table->string('nacionalidad');
            $table->string('direccion');
            $table->string('telefono_celular');
            $table->string('email')->unique();
            $table->string('sexo')->default('varon');

            $table->string('academico_grado');
            $table->string('academico_gestion');
            $table->string('academico_institucion');
            $table->string('academico_titulo');
            $table->string('credencializacion_fotografia');

            $table->string('telefono')->nullable();
            $table->string('fax')->nullable();
            $table->string('casilla_postal')->nullable();

            $table->string('numero_libreta_militar')->default('_');
            $table->string('foto_militar')->nullable();

            $table->boolean('aprobado')->default(false);
            $table->boolean('nivel_completo')->default(false);
            $table->boolean('es_admin')->default(false);
            $table->boolean('disponibilidad');

            $table->unsignedBigInteger('nivel_id');
            $table->unsignedBigInteger('cargo_id');

            $table->foreign('nivel_id')
                    ->references('nivel_id')
                    ->on('niveles')
                    ->onDelete('cascade');

            $table->foreign('cargo_id')
                    ->references('cargo_id')
                    ->on('cargos')
                    ->onDelete('cascade');

            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
