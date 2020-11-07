<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaludEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salud_estudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiante');
            //estudiante
            $table->integer('enfermedad')->comment('0: Si, 1: No');
            $table->string('cual_enfermedad')->nullable();
            $table->integer('tratamiento_medico')->comment('0: Si, 1: No');
            $table->string('cual_tratamiento_medico')->nullable();
            $table->integer('dificultad_aprendizaje')->comment('0: Si, 1: No');
            $table->integer('atencion_psicologica')->comment('0: Si, 1: No');
            $table->integer('atencion_neurologica')->comment('0: Si, 1: No');
            $table->integer('problemas_lenguaje')->comment('0: Si, 1: No');
            $table->integer('discapacidad')->comment('0: Si, 1: No');
            $table->string('cual_discapacidad')->nullable();
            $table->integer('protesis')->comment('0: Si, 1: No');
            $table->string('cual_protesis')->nullable();
            $table->integer('consume_alcohol')->comment('0: Si, 1: No');
            $table->string('frecuencia_consume_alcohol')->nullable();
            $table->integer('consume_drogas')->comment('0: Si, 1: No');
            $table->integer('fuma')->comment('0: Si, 1: No');
            //familiar
            $table->integer('cancer')->comment('0: Si, 1: No');
            $table->integer('diabetes')->comment('0: Si, 1: No');
            $table->integer('vih_sida')->comment('0: Si, 1: No');
            $table->integer('asma')->comment('0: Si, 1: No');
            $table->integer('hepatitis')->comment('0: Si, 1: No');
            $table->integer('hipertension')->comment('0: Si, 1: No');
            $table->integer('epilepsia')->comment('0: Si, 1: No');
            $table->integer('tuberculosis')->comment('0: Si, 1: No');
            $table->integer('retardo_mental')->comment('0: Si, 1: No');
            $table->integer('esquizofrenia')->comment('0: Si, 1: No');
            $table->integer('enfermedades_neurologicas')->comment('0: Si, 1: No');
            $table->integer('artritis')->comment('0: Si, 1: No');
            $table->integer('familiar_discapacidad')->comment('0: Si, 1: No');
            $table->string('tipo_familiar_discapacidad')->nullable();

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
        Schema::dropIfExists('salud_estudiante');
    }
}
