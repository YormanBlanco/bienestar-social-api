<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadorSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajador_social', function (Blueprint $table) {
            $table->increments('id');

            $table->string('lastnames', 150);
            $table->string('names', 150);
            $table->string('cedula', 11);
            $table->string('email', 191)->nullable();
            $table->string('movil_phone', 17)->nullable();
            $table->string('local_phone', 17)->nullable();
            $table->string('other_phone', 17)->nullable();
            $table->string('address', 250);

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
        Schema::dropIfExists('trabajador_social');
    }
}
