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
        
        <div id="datospersonales" class="col-md-12">

            <h2> Datos personales </h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="names">Nombres</label>
                    <input required type="text" class="form-control" placeholder="Nombres"  name="names">
                </div>

                <div class="form-group col-md-6">
                    <label for="lastnames">Apellidos</label>
                    <input required type="text" class="form-control" placeholder="Apellidos" name="lastnames">
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-1">
                    <label for="cedula_tipo">Tipo</label>
                    <select required name="cedula_tipo" class="form-control">
                        <option selected value="V" >V</option>
                        <option value="E" >E</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="cedula">Cédula de identidad</label>
                    <input required type="num" class="form-control" placeholder="Cédula de identidad"  name="cedula">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="birth_date">Fecha de nacimiento</label>
                    <input required type="date" class="form-control" placeholder="Fecha de nacimiento" name="birth_date">
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="place_birth">Lugar de nacimiento</label>
                    <input required type="text" class="form-control" placeholder="Lugar de nacimiento"  name="place_birth">
                </div>

                <div class="form-group col-md-6">
                    <label for="sex">Sexo</label>
                    <select required name="cedula_tipo" class="form-control">
                        <option disabled selected>Seleccione</option>
                        <option value="Femenino" >Femenino</option>
                        <option value="Masculino" >Masculino</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Email"  name="email">
                </div>

                <div class="form-group col-md-6">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" placeholder="Twitter"  name="twitter">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="movil_phone_code">Código</label>
                    <select name="movil_phone_code" class="form-control">
                        <option disabled selected>Seleccione</option>
                        <option value="0412" >0412</option>
                        <option value="0414" >0414</option>
                        <option value="0424" >0424</option>
                        <option value="0426" >0426</option>
                        <option value="0416" >0416</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="movil_phone">Teléfono móvil</label>
                    <input type="tel" pattern="[0-7]{7}" class="form-control" placeholder=""  name="movil_phone">
                </div>

                <div class="form-group col-md-6">
                    <label for="local_phone">Teléfono local</label>
                    <input type="tel" pattern="[0-7]{7}" class="form-control" placeholder=""  name="local_phone">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="other_phone_code">Código</label>
                    <select name="other_phone_code" class="form-control">
                        <option disabled selected>Seleccione</option>
                        <option value="0412" >0412</option>
                        <option value="0414" >0414</option>
                        <option value="0424" >0424</option>
                        <option value="0426" >0426</option>
                        <option value="0416" >0416</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="other_phone">Teléfono alternativo</label>
                    <input type="tel" pattern="[0-7]{7}" class="form-control" placeholder=""  name="other_phone">
                </div>

                <div class="form-group col-md-6">
                    <label for="address_origin">Dirección de origen</label>
                    <input required type="tex" class="form-control" placeholder="Dirección de origen"  name="address_origin">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="live_residence">¿Vive en residencia?</label>
                    <select required id="live_residence" name="live_residence" class="form-control" onChange="mostrar(this.value);">
                        <option disabled selected>Seleccione</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group col-md-4"  id="address_residence" style="display: none;">
                    <label for="address_residence">Dirección de residencia</label>
                    <input type="tex" class="form-control" placeholder="Dirección de origen"  name="address_residence">
                </div>

                <div class="form-group col-md-6" id="residence_phone" style="display: none;">
                    <label for="residence_phone">Teléfono de residencia</label>
                    <input type="tel" pattern="[0-7]{7}" class="form-control" placeholder=""  name="residence_phone">
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
                        <option value="Opsu"> Opsu </option>
                        <option value="Convenio"> Convenio </option>
                        <option value="Otro"> Otro </option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="carrer_or_pnf">Carreca o PNF</label>
                    <input type="tex" class="form-control" placeholder="Carrera o PNF"  name="carrer_or_pnf">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="admission_period">Período de ingreso</label>
                    <input type="tex" class="form-control" placeholder="Período de ingreso"  name="admission_period">
                </div>

                <div class="form-group col-md-6">
                    <label for="semestre_trayecto">Semestre o Trayecto</label>
                    <input type="tex" class="form-control" placeholder="Semestre o Trayecto"  name="semestre_trayecto">
                </div>
               
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="turn">Turno</label>
                    <input type="tex" class="form-control" placeholder="Turno"  name="turn">
                </div>

                <div class="form-group col-md-6">
                    <label for="change_carrer">¿Ha realizado cambio de carrera o PNF?</label>
                    <select required id="change_carrer" name="change_carrer" class="form-control" onChange="changeCarrer(this.value);">
                        <option disabled selected>Seleccione</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="form-group col-md-12" id="cause_change" style="display: none;">
                    <label for="cause_change">Causa del cambio</label>
                    <input type="text" class="form-control" placeholder=""  name="cause_change">
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
                    Guardar
                </button> 
            </div>
            <br>
            <br>

        </div>

    </form>
</div>

<script type="text/javascript">
    function mostrar(id) {
        if (id == "si") {
            $("#address_residence").show();
            $("#residence_phone").show();
        }

        if (id == "no") {
            $("#address_residence").hide();
            $("#residence_phone").hide();
        }
    }

    function changeCarrer(id){
        if(id== "si"){
            $("#cause_change").show();
        }
        if (id == "no") {
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

