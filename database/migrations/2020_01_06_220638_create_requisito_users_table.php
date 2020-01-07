<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisito_users', function (Blueprint $table) {
            $table->bigIncrements('requisito_user_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('nivel_id');
            $table->unsignedBigInteger('requisito_id');
            $table->string('archivo')->nullable();
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
        Schema::dropIfExists('requisito_users');
    }
}
