@extends('adminlte::page')

@section('title', 'Registrar familiares')

@section('content_header')
    <h1>       
        <a href="{{ url("family") }}" class="btn btn-primary pull-right">
            <i class="fa fa-arrow-left" aria-hidden="true">  </i>
            Volver
        </a>
        Nueva constelación familiar
    </h1>

    @if(session('message'))
        <br>

        <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
            <ul>
                <li>{{session('message')}}</li>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->

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

    @if(session('msg'))
        <br>

        <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
            <ul>
                <li>{{session('msg')}}</li>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->
        
        @section('js')
            @routes
            <script type="text/javascript">     
                let estudiante_id = {{ $estudiante->id }};
                let url = route('getFamilyByEstudianteId',estudiante_id);
                Swal.fire({ 
                    type: 'success',                                   
                    title: '¡Familiar registrado satisfactoriamente!',
                    text: '¿Deseas registrar otro familiar?',                   
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: `Si`,
                    cancelButtonText: `No, continuar`,
                    }).then((result) => {
                        console.log(result);
                        if (result.value == true) {
                            return
                        } else if (result.dismiss) {
                            Swal.fire({
                                type: 'question',
                                title: '¿Estas seguro que no deseas registrar más familiares para este estudiante?',
                                showConfirmButton: true,
                                showCancelButton: true,
                                confirmButtonText: `Si, continuar`,
                                cancelButtonText: `No, regresar`,
                            }).then((result) => {
                                if (result.value == true) {
                                    document.location.href = url;
                                }
                                else if (result.dismiss) {
                                    return;
                                }
                            })
                            
                        }
                    })

            </script>
        @stop

        <br>

    @endif
    

@stop

@section('content')
    
<div class="container">

    @if($family ?? '')
        
        <form action="{{url('socioeconomic')}}" method="POST" enctype="multipart/form-data" novalidate>
            {{csrf_field()}}
                
            <h2> Área socio-económica </h2>

            

        </form>

    @else
    

        <form action="{{url('family')}}" method="POST" enctype="multipart/form-data" novalidate>
            {{csrf_field()}}
                
            <h2> Constelación familiar de estudiante: {{ $estudiante->names }} {{ $estudiante->lastnames }} {{ $estudiante->cedula_tipo }}-{{ $estudiante->cedula }} </h2>

            <div class="col-md-12">

                <div class="form-row">
                    <input type="text" class="form-control" name="estudiante_id"  value="{{ $estudiante->id }}" style="display: none;">

                    <div class="form-group col-md-4">
                        <label for="names">Nombres</label>
                        <input required type="text" class="form-control" placeholder="Nombres"  name="names"  value="{{ old('names') }}">
                        @if ($errors->has('names'))
                            <small class="form-text text-danger">
                                {{ $errors->first('names') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="lastnames">Apellidos</label>
                        <input required type="text" class="form-control" placeholder="Apellidos" name="lastnames" value="{{ old('lastnames') }}">
                        @if ($errors->has('lastnames'))
                            <small class="form-text text-danger">
                                {{ $errors->first('lastnames') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
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
                    <div class="form-group col-md-4">
                        <label for="names">Edad</label>
                        <input required type="text" class="form-control" placeholder="Edad"  name="edad"  value="{{ old('edad') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('edad'))
                            <small class="form-text text-danger">
                                {{ $errors->first('edad') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="lastnames">Parentesco</label>
                        <input required type="text" class="form-control" placeholder="Parentesco" name="parentesco" value="{{ old('parentesco') }}">
                        @if ($errors->has('parentesco'))
                            <small class="form-text text-danger">
                                {{ $errors->first('parentesco') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="lastnames">Nivel de instrucción</label>
                        <input required type="text" class="form-control" placeholder="Nivel de instrucción" name="nivel_instruccion" value="{{ old('nivel_instruccion') }}">
                        @if ($errors->has('nivel_instruccion'))
                            <small class="form-text text-danger">
                                {{ $errors->first('nivel_instruccion') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="names">Profeción u oficio</label>
                        <input required type="text" class="form-control" placeholder="Profeción u oficio"  name="profecion_oficio"  value="{{ old('profecion_oficio') }}">
                        @if ($errors->has('profecion_oficio'))
                            <small class="form-text text-danger">
                                {{ $errors->first('profecion_oficio') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="lastnames">Ingreso mensual</label>
                        <input required type="text" class="form-control" placeholder="Ingreso mensual" name="ingreso_mensual" value="{{ old('ingreso_mensual') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('ingreso_mensual'))
                            <small class="form-text text-danger">
                                {{ $errors->first('ingreso_mensual') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="lastnames">Aporte familiar</label>
                        <input required type="text" class="form-control" placeholder="Aporte familiar" name="aporte_to_family" value="{{ old('aporte_to_family') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('aporte_to_family'))
                            <small class="form-text text-danger">
                                {{ $errors->first('aporte_to_family') }}
                            </small>
                        @endif
                    </div>

                </div>

                <!-- Boton regresar -->
                <br>
                <div class="col-md-12 text-center"> 
                    <button type="submit" class="btn btn-success pull-center">
                        Registrar
                    </button> 
                </div>
                <br>
                <br>


            </div>
            

        </form>

    @endif
</div>




@stop

