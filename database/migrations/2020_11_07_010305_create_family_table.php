<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastnames', 150);
            $table->string('names', 150);
            $table->enum('sex', ['Masculino', 'Femenino']);
            $table->string('edad');
            $table->string('parentesco');
            $table->string('nivel_instruccion');
            $table->string('profecion_oficio');
            $table->float('ingreso_mensual');
            $table->float('aporte_to_family');

            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiante');


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
        Schema::dropIfExists('family');
    }
}
