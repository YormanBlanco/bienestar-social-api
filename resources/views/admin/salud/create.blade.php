@extends('adminlte::page')

@section('title', 'Salud estudiante')

@section('content_header')

    <h1>       
        <a href="{{ url("vivienda") }}" class="btn btn-primary pull-right">
            <i class="fa fa-arrow-left" aria-hidden="true">  </i>
            Volver
        </a>
        Estudiante: {{ $estudiante->names }} {{ $estudiante->lastnames }} {{ $estudiante->cedula_tipo }}-{{ $estudiante->cedula }}
    </h1>
    

@stop

@section('content')
    
<div class="container">

    @if(session('message'))
        <br>

        @section('js')
            <script type="text/javascript">
                Swal.fire(
                    `{{session('message')}}`,
                    '',
                    'success'
                    )

            </script>
        @stop

        <br>
    @endif
        
        <form action="{{url('saludestudiante')}}" method="POST" enctype="multipart/form-data" novalidate>
            {{csrf_field()}}
                
            <h2> Condiciones de salud  </h2>
            <br>

            <input type="text" class="form-control" name="estudiante_id"  value="{{ $estudiante->id }}" style="display: none;">

                

            <div id="estudiante" class="col-md-12">
                <h2> Condiciones de salud del estudiante  </h2>
                <br>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="enfermedad">¿Padece de alguna enfermedad?</label>
                        <select required name="enfermedad" id="enfermedad"  class="form-control" onChange="cualEnfermedad(this.value);">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('enfermedad') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('enfermedad') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('enfermedad'))
                            <small class="form-text text-danger">
                                {{ $errors->first('enfermedad') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="cual_enfermedad" style="display: none;">
                        <div class="form-group col-md-12">
                            <label for="cual_enfermedad">¿Cuál enfermedad?</label>
                            <input required type="text" class="form-control" name="cual_enfermedad"  value="{{ old('cual_enfermedad') }}">
                            @if ($errors->has('cual_enfermedad'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('cual_enfermedad') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tratamiento_medico">¿Tiene algún tratamiento médico?</label>
                        <select required name="tratamiento_medico" id="tratamiento_medico"  class="form-control" onChange="cualTratamiento(this.value);">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('tratamiento_medico') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('tratamiento_medico') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('tratamiento_medico'))
                            <small class="form-text text-danger">
                                {{ $errors->first('tratamiento_medico') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="cual_tratamiento_medico" style="display: none;">
                        <div class="form-group col-md-12">
                            <label for="cual_tratamiento_medico">Cuál</label>
                            <input required type="text" class="form-control" name="cual_tratamiento_medico"  value="{{ old('cual_tratamiento_medico') }}">
                            @if ($errors->has('cual_tratamiento_medico'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('cual_tratamiento_medico') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dificultad_aprendizaje">¿Ha presentado dificultad de aprendizaje?</label>
                        <select required name="dificultad_aprendizaje" id="dificultad_aprendizaje"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('dificultad_aprendizaje') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('dificultad_aprendizaje') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('dificultad_aprendizaje'))
                            <small class="form-text text-danger">
                                {{ $errors->first('dificultad_aprendizaje') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="atencion_psicologica">Atención psicológica</label>
                        <select required name="atencion_psicologica" id="atencion_psicologica"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('atencion_psicologica') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('atencion_psicologica') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('atencion_psicologica'))
                            <small class="form-text text-danger">
                                {{ $errors->first('atencion_psicologica') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="atencion_neurologica">Atención neurológica</label>
                        <select required name="atencion_neurologica" id="atencion_neurologica"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('atencion_neurologica') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('atencion_neurologica') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('atencion_neurologica'))
                            <small class="form-text text-danger">
                                {{ $errors->first('atencion_neurologica') }}
                            </small>atencion_neurologica
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="problemas_lenguaje">Problemas de lenguaje</label>
                        <select required name="problemas_lenguaje" id="problemas_lenguaje"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('problemas_lenguaje') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('problemas_lenguaje') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('problemas_lenguaje'))
                            <small class="form-text text-danger">
                                {{ $errors->first('problemas_lenguaje') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="discapacidad">¿Tiene alguna discapacidad?</label>
                        <select required name="discapacidad" id="discapacidad"  class="form-control" onChange="cualDiscapacidad(this.value);">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('discapacidad') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('discapacidad') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('discapacidad'))
                            <small class="form-text text-danger">
                                {{ $errors->first('discapacidad') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="cual_discapacidad" style="display: none;">
                        <div class="form-group col-md-12">
                            <label for="cual_discapacidad">Cuál</label>
                            <input required type="text" class="form-control" name="cual_discapacidad"  value="{{ old('cual_discapacidad') }}">
                            @if ($errors->has('cual_discapacidad'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('cual_discapacidad') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="protesis">¿Usa protésis?</label>
                        <select required name="protesis" id="protesis"  class="form-control" onChange="cualProtesis(this.value);">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('protesis') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('protesis') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('protesis'))
                            <small class="form-text text-danger">
                                {{ $errors->first('protesis') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="cual_protesis" style="display: none;">
                        <div class="form-group col-md-12">
                            <label for="cual_protesis">Méncionela</label>
                            <input required type="text" class="form-control" name="cual_protesis"  value="{{ old('cual_protesis') }}">
                            @if ($errors->has('cual_protesis'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('cual_protesis') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="consume_alcohol">¿Consume alcohol?</label>
                        <select required name="consume_alcohol" id="consume_alcohol"  class="form-control" onChange="cualAlcohol(this.value);">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('consume_alcohol') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('consume_alcohol') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('consume_alcohol'))
                            <small class="form-text text-danger">
                                {{ $errors->first('consume_alcohol') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="frecuencia_consume_alcohol" style="display: none;">
                        <div class="form-group col-md-12">
                            <label for="frecuencia_consume_alcohol">Frecuencia</label>
                            <input required type="text" class="form-control" name="frecuencia_consume_alcohol"  value="{{ old('frecuencia_consume_alcohol') }}">
                            @if ($errors->has('frecuencia_consume_alcohol'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('frecuencia_consume_alcohol') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="consume_drogas">¿Consume drogas?</label>
                        <select required name="consume_drogas" id="consume_drogas"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('consume_drogas') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('consume_drogas') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('consume_drogas'))
                            <small class="form-text text-danger">
                                {{ $errors->first('consume_drogas') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fuma">¿Fuma?</label>
                        <select required name="fuma" id="fuma"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('fuma') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('fuma') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('fuma'))
                            <small class="form-text text-danger">
                                {{ $errors->first('fuma') }}
                            </small>
                        @endif
                    </div>
                </div>

                <!-- Boton continuar -->
                <br>
                <div class="form-row">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-secondary pull-center" id="continuar" onclick="continuar()">
                            <i class="fa fa-arrow-right" aria-hidden="true">  </i>
                            Siguiente página
                        </button> 
                    </div>
                </div>
                <br>
                <br>

            </div>

            <div id="familiares" class="col-md-12" style="display: none;">
                <h2> Antecedentes familiares de enfermedades  </h2>
                <br>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cancer">Cáncer</label>
                        <select required name="cancer" id="cancer"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('cancer') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('cancer') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('cancer'))
                            <small class="form-text text-danger">
                                {{ $errors->first('cancer') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="diabetes">Diabetes</label>
                        <select required name="diabetes" id="diabetes"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('diabetes') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('diabetes') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('diabetes'))
                            <small class="form-text text-danger">
                                {{ $errors->first('diabetes') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="vih_sida">VIH/Sida</label>
                        <select required name="vih_sida" id="vih_sida"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('vih_sida') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('vih_sida') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('vih_sida'))
                            <small class="form-text text-danger">
                                {{ $errors->first('vih_sida') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="asma">Asma</label>
                        <select required name="asma" id="asma"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('asma') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('asma') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('asma'))
                            <small class="form-text text-danger">
                                {{ $errors->first('asma') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="hepatitis">Hepátitis</label>
                        <select required name="hepatitis" id="hepatitis"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('hepatitis') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('hepatitis') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('hepatitis'))
                            <small class="form-text text-danger">
                                {{ $errors->first('hepatitis') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="hipertension">Hipertensión</label>
                        <select required name="hipertension" id="hipertension"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('hipertension') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('hipertension') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('hipertension'))
                            <small class="form-text text-danger">
                                {{ $errors->first('hipertension') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="epilepsia">Epilepsia</label>
                        <select required name="epilepsia" id="epilepsia"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('epilepsia') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('epilepsia') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('epilepsia'))
                            <small class="form-text text-danger">
                                {{ $errors->first('epilepsia') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tuberculosis">Tuberculosis</label>
                        <select required name="tuberculosis" id="tuberculosis"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('tuberculosis') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('tuberculosis') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('tuberculosis'))
                            <small class="form-text text-danger">
                                {{ $errors->first('tuberculosis') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="retardo_mental">Retardo mental</label>
                        <select required name="retardo_mental" id="retardo_mental"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('retardo_mental') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('retardo_mental') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('retardo_mental'))
                            <small class="form-text text-danger">
                                {{ $errors->first('retardo_mental') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="esquizofrenia">Esquizofrenia</label>
                        <select required name="esquizofrenia" id="esquizofrenia"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('esquizofrenia') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('esquizofrenia') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('esquizofrenia'))
                            <small class="form-text text-danger">
                                {{ $errors->first('esquizofrenia') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="enfermedades_neurologicas">Enfermedades Neurológicas</label>
                        <select required name="enfermedades_neurologicas" id="enfermedades_neurologicas"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('enfermedades_neurologicas') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('enfermedades_neurologicas') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('enfermedades_neurologicas'))
                            <small class="form-text text-danger">
                                {{ $errors->first('enfermedades_neurologicas') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="artritis">Artritis</label>
                        <select required name="artritis" id="artritis"  class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('artritis') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('artritis') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('retardo_mental'))
                            <small class="form-text text-danger">
                                {{ $errors->first('artritis') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="familiar_discapacidad">¿Tiene algún familiar con discapacidad?</label>
                        <select required name="familiar_discapacidad" id="familiar_discapacidad"  class="form-control" onChange="cualFamiliarDiscapacidad(this.value);">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('familiar_discapacidad') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('familiar_discapacidad') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('familiar_discapacidad'))
                            <small class="form-text text-danger">
                                {{ $errors->first('familiar_discapacidad') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="tipo_familiar_discapacidad" style="display: none;">
                        <div class="form-group col-md-12">
                            <label for="tipo_familiar_discapacidad">Tipo de discapacidad</label>
                            <input required type="text" class="form-control" name="tipo_familiar_discapacidad"  value="{{ old('tipo_familiar_discapacidad') }}">
                            @if ($errors->has('tipo_familiar_discapacidad'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('tipo_familiar_discapacidad') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
                    
                <!-- Botones -->
                <br>
                <div class="form-row">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-secondary pull-center" id="regresar" onclick="regresar()">
                            <i class="fa fa-arrow-left" aria-hidden="true">  </i>
                            Anterior página
                        </button> 
                        <button type="submit" class="btn btn-success pull-center">
                            Registrar
                        </button> 
                    </div>
                </div>
                <br>
                <br>

            </div>



        </form>

        


</div>

@section('js')
<script type="text/javascript"> 

    //---------Primera pagina-----
        //continuar a 2da página
    var continuar = document.getElementById('continuar');
    continuar.onclick = function(){
        if(
            $("#enfermedad").val() == null || $("#tratamiento_medico").val() == null 
            || $("#dificultad_aprendizaje").val() == null || $("#atencion_psicologica").val() == null || $("#atencion_neurologica").val() == null
            || $("#problemas_lenguaje").val() == null || $("#discapacidad").val() == null || $("#protesis").val() == null
            || $("#consume_alcohol").val() == null || $("#consume_drogas").val() == null || $("#fuma").val() == null
        ){
            Swal.fire({
                type: 'error',
                title: 'Ups...',
                text: 'No puedes dejar campos vacíos',
            })
        }
        else{
            $("#estudiante").hide();
            $("#familiares").show();
        }
        
    }  
    //---------Primera pagina-----  

    //--------Segunda pagina-----------
        //regresar primera pagina
    var regresar = document.getElementById('regresar');
    regresar.onclick = function(){
        $("#familiares").hide();
        $("#estudiante").show();    
    }   
    //--------Segunda pagina-----------         

    function cualEnfermedad(id) {
        if (id == 0) {
            $("#cual_enfermedad").show();
        }

        if (id == 1) {
            $("#cual_enfermedad").hide();
        }
    }

    function cualTratamiento(id) {
        if (id == 0) {
            $("#cual_tratamiento_medico").show();
        }

        if (id == 1) {
            $("#cual_tratamiento_medico").hide();
        }
    }

    function cualDiscapacidad(id) {
        if (id == 0) {
            $("#cual_discapacidad").show();
        }

        if (id == 1) {
            $("#cual_discapacidad").hide();
        }
    }

    function cualProtesis(id) {
        if (id == 0) {
            $("#cual_protesis").show();
        }

        if (id == 1) {
            $("#cual_protesis").hide();
        }
    }

    function cualAlcohol(id) {
        if (id == 0) {
            $("#frecuencia_consume_alcohol").show();
        }

        if (id == 1) {
            $("#frecuencia_consume_alcohol").hide();
        }
    }

    function cualFamiliarDiscapacidad(id) {
        if (id == 0) {
            $("#tipo_familiar_discapacidad").show();
        }

        if (id == 1) {
            $("#tipo_familiar_discapacidad").hide();
        }
    }
    
</script>
@stop
    

@stop