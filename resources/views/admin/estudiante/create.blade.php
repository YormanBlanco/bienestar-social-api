@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
    <h1>       
        <a href="{{ url("estudiante") }}" class="btn btn-primary pull-right">
            <i class="fa fa-arrow-left" aria-hidden="true">  </i>
            Volver
        </a>
        Nuevo estudiante
    </h1>
    

@stop

@section('content')
    
<div class="container">
    <form action="{{url('estudiante')}}" method="POST" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
            
        
        <div id="datospersonales" class="col-md-12">

            <h2> Datos personales </h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="names">Nombres</label>
                    <input required type="text" class="form-control" placeholder="Nombres"  name="names"  value="{{ old('names') }}">
                    @if ($errors->has('names'))
                        <small class="form-text text-danger">
                            {{ $errors->first('names') }}
                        </small>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="lastnames">Apellidos</label>
                    <input required type="text" class="form-control" placeholder="Apellidos" name="lastnames" value="{{ old('lastnames') }}">
                    @if ($errors->has('lastnames'))
                        <small class="form-text text-danger">
                            {{ $errors->first('lastnames') }}
                        </small>
                    @endif
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-1">
                    <label for="cedula_tipo">Tipo</label>
                    <select required name="cedula_tipo" class="form-control">
                        <option selected value="V" {{ old('cedula_tipo') =='V' ? 'selected' : '' }}>V</option>
                        <option value="E" {{ old('cedula_tipo') =='E' ? 'selected' : '' }} >E</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="cedula">Cédula de identidad</label>
                    <input required type="text" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder="Cédula de identidad"  name="cedula" value="{{ old('cedula') }}">
                    @if ($errors->has('cedula'))
                        <small class="form-text text-danger">
                            {{ $errors->first('cedula') }}
                        </small>
                    @endif
                </div>
                
                <div class="form-group col-md-6">
                    <label for="birth_date">Fecha de nacimiento</label>
                    <input required type="date" class="form-control" placeholder="Fecha de nacimiento" name="birth_date" value="{{ old('birth_date') }}">
                    @if ($errors->has('birth_date'))
                        <small class="form-text text-danger">
                            {{ $errors->first('birth_date') }}
                        </small>
                    @endif
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="place_birth">Lugar de nacimiento</label>
                    <input required type="text" class="form-control" placeholder="Lugar de nacimiento"  name="place_birth" value="{{ old('place_birth') }}">
                    @if ($errors->has('place_birth'))
                        <small class="form-text text-danger">
                            {{ $errors->first('place_birth') }}
                        </small>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="sex">Sexo</label>
                    <select required name="sex" class="form-control">
                        <option disabled selected>Seleccione</option>
                        <option value="Femenino" {{ old('sex') =='Femenino' ? 'selected' : '' }} >Femenino</option>
                        <option value="Masculino" {{ old('sex') =='Masculino' ? 'selected' : '' }} >Masculino</option>
                    </select>
                    @if ($errors->has('sex'))
                        <small class="form-text text-danger">
                            {{ $errors->first('sex') }}
                        </small>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Email"  name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <small class="form-text text-danger">
                            {{ $errors->first('email') }}
                        </small>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" placeholder="Twitter"  name="twitter" value="{{ old('twitter') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="movil_phone_code">Código</label>
                    <select name="movil_phone_code" class="form-control">
                        <option disabled selected>Seleccione</option>
                        <option value="0412" {{ old('movil_phone_code') =='0412' ? 'selected' : '' }} >0412</option>
                        <option value="0414" {{ old('movil_phone_code') =='0414' ? 'selected' : '' }} >0414</option>
                        <option value="0424" {{ old('movil_phone_code') =='0424' ? 'selected' : '' }} >0424</option>
                        <option value="0426" {{ old('movil_phone_code') =='0426' ? 'selected' : '' }} >0426</option>
                        <option value="0416" {{ old('movil_phone_code') =='0416' ? 'selected' : '' }} >0416</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="movil_phone">Teléfono móvil</label>
                    <input type="text" maxlength="7" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder=""  name="movil_phone" value="{{ old('movil_phone') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="local_phone">Teléfono local</label>
                    <input type="text" maxlength="12" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder=""  name="local_phone" value="{{ old('local_phone') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="other_phone_code">Código</label>
                    <select name="other_phone_code" class="form-control">
                        <option disabled selected>Seleccione</option>
                        <option value="0412" {{ old('other_phone_code') =='0412' ? 'selected' : '' }} >0412</option>
                        <option value="0414" {{ old('other_phone_code') =='0414' ? 'selected' : '' }} >0414</option>
                        <option value="0424" {{ old('other_phone_code') =='0424' ? 'selected' : '' }} >0424</option>
                        <option value="0426" {{ old('other_phone_code') =='0426' ? 'selected' : '' }} >0426</option>
                        <option value="0416" {{ old('other_phone_code') =='0416' ? 'selected' : '' }} >0416</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="other_phone">Teléfono alternativo</label>
                    <input type="text" maxlength="7" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder=""  name="other_phone" value="{{ old('other_phone') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="address_origin">Dirección de origen</label>
                    <input required type="tex" class="form-control" placeholder="Dirección de origen"  name="address_origin" value="{{ old('address_origin') }}">
                    @if ($errors->has('address_origin'))
                        <small class="form-text text-danger">
                            {{ $errors->first('address_origin') }}
                        </small>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="live_residence">¿Vive en residencia?</label>
                    <select required id="live_residence" name="live_residence" class="form-control" onChange="mostrar(this.value);" value="{{ old('live_residence') }}">
                        <option disabled selected>Seleccione</option>
                        <option value="Si" {{ old('live_residence') =='Si' ? 'selected' : '' }} >Si</option>
                        <option value="No" {{ old('live_residence') =='No' ? 'selected' : '' }} >No</option>
                    </select>
                    @if ($errors->has('live_residence'))
                        <small class="form-text text-danger">
                            {{ $errors->first('live_residence') }}
                        </small>
                    @endif
                </div>
                <div class="form-group col-md-4"  id="address_residence" style="display: none;">
                    <label for="address_residence">Dirección de residencia</label>
                    <input type="tex" class="form-control" placeholder="Dirección de origen"  name="address_residence" value="{{ old('address_residence') }}">
                </div>

                <div class="form-group col-md-6" id="residence_phone" style="display: none;">
                    <label for="residence_phone">Teléfono de residencia</label>
                    <input type="tel" pattern="[0-7]{7}" class="form-control" placeholder=""  name="residence_phone" value="{{ old('residence_phone') }}">
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

        <div id="datosacademicos" style="display: none;">

            <h2> Datos académicos </h2>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="admission_university">Ingreso a la universidad</label>
                    <select required name="admission_university" class="form-control">
                        <option disabled selected>Seleccione</option>
                        <option value="0" {{ old('admission_university') =='0' ? 'selected' : '' }} > Opsu </option>
                        <option value="1" {{ old('admission_university') =='1' ? 'selected' : '' }} > Convenio </option>
                        <option value="2" {{ old('admission_university') =='2' ? 'selected' : '' }} > Otro </option>
                    </select>
                    @if ($errors->has('admission_university'))
                        <small class="form-text text-danger">
                            {{ $errors->first('admission_university') }}
                        </small>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="carrer_or_pnf">Carreca o PNF</label>
                    <input type="tex" class="form-control" placeholder="Carrera o PNF"  name="carrer_or_pnf" value="{{ old('carrer_or_pnf') }}">
                    @if ($errors->has('carrer_or_pnf'))
                        <small class="form-text text-danger">
                            {{ $errors->first('carrer_or_pnf') }}
                        </small>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="admission_period">Período de ingreso</label>
                    <input type="tex" class="form-control" placeholder="Período de ingreso"  name="admission_period" value="{{ old('admission_period') }}">
                    @if ($errors->has('admission_period'))
                        <small class="form-text text-danger">
                            {{ $errors->first('admission_period') }}
                        </small>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="semestre_trayecto">Semestre o Trayecto</label>
                    <input type="tex" class="form-control" placeholder="Semestre o Trayecto"  name="semestre_trayecto" value="{{ old('semestre_trayecto') }}">
                    @if ($errors->has('semestre_trayecto'))
                        <small class="form-text text-danger">
                            {{ $errors->first('semestre_trayecto') }}
                        </small>
                    @endif
                </div>
               
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="turn">Turno</label>
                    <input type="tex" class="form-control" placeholder="Turno"  name="turn" value="{{ old('turn') }}">
                    @if ($errors->has('turn'))
                        <small class="form-text text-danger">
                            {{ $errors->first('turn') }}
                        </small>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="change_carrer">¿Ha realizado cambio de carrera o PNF?</label>
                    <select required id="change_carrer" name="change_carrer" class="form-control" onChange="changeCarrer(this.value);">
                        <option disabled selected>Seleccione</option>
                        <option value="0" {{ old('change_carrer') =='0' ? 'selected' : '' }} >Si</option>
                        <option value="1" {{ old('change_carrer') =='1' ? 'selected' : '' }} >No</option>
                    </select>
                    @if ($errors->has('change_carrer'))
                        <small class="form-text text-danger">
                            {{ $errors->first('change_carrer') }}
                        </small>
                    @endif
                </div>

                <div class="form-group col-md-12" id="cause_change" style="display: none;">
                    <label for="cause_change">Causa del cambio</label>
                    <input type="text" class="form-control" placeholder=""  name="cause_change" value="{{ old('cause_change') }}">
                </div>
            </div>

            <!-- Boton regresar -->
            <br>
            <div class="col-md-12 text-center">
                <button type="button" class="btn btn-secondary pull-center" id="regresar" onclick="regresar()">
                    <i class="fa fa-arrow-left" aria-hidden="true">  </i>
                    Anterior página
                </button> 
                <button type="submit" class="btn btn-success pull-center">
                    Registrar
                </button> 
            </div>
            <br>
            <br>

        </div>

    </form>
</div>

<script type="text/javascript">
    function mostrar(id) {
        if (id == "Si") {
            $("#address_residence").show();
            $("#residence_phone").show();
        }

        if (id == "No") {
            $("#address_residence").hide();
            $("#residence_phone").hide();
        }
    }

    function changeCarrer(id){
        if(id== 0){ //si
            $("#cause_change").show();
        }
        if (id == 1) { //no
            $("#cause_change").hide();
        }
    }

    var continuar = document.getElementById('continuar');
    continuar.onclick = function(){
        if($(".lastnames") == '' || $(".names") == '' || $(".cedula") == '' || $(".birth_date") == '' || $(".place_birth") == '' || $(".sex") == '' || $(".address_origin") == '' || $(".live_residence") == ''){
            alert('No puede dejar campos vacíos');
        }
        else{
            $("#datospersonales").hide();
            $("#datosacademicos").show();
        }
        
    }

    var regresar = document.getElementById('regresar');
    regresar.onclick = function(){
        $("#datosacademicos").hide();
        $("#datospersonales").show();     
    }

</script>

@stop

