<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->increments('id');
            //Datos personales
            $table->string('lastnames', 150);
            $table->string('names', 150);
            $table->string('cedula', 11);
            $table->date('birth_date');
            $table->string('place_birth', 250);
            $table->enum('sex', ['Masculino', 'Femenino']);
            $table->string('email', 191)->nullable();
            $table->string('twitter')->nullable();
            $table->string('movil_phone', 17)->nullable();
            $table->string('local_phone', 17)->nullable();
            $table->string('other_phone', 17)->nullable();
            $table->string('address_origin', 250);
            $table->enum('live_residence', ['Si', 'No']);
            $table->string('address_residence', 250)->nullable();
            $table->string('residence_phone', 17)->nullable();
            //Datos academicos
            $table->integer('admission_university')->comment('0: Opsu, 1: Convenio, 2: Otro');
            $table->string('carrer_or_pnf');
            $table->string('admission_period');
            $table->string('semestre_trayecto');
            $table->string('turn');
            $table->integer('change_carrer')->comment('0: Si, 1: No');
            $table->string('cause_change')->nullable();

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
        Schema::dropIfExists('estudiante');
    }
}
