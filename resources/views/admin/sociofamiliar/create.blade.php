@extends('adminlte::page')

@section('title', 'Socio familiar')

@section('content_header')

    <h1>       
        <a href="{{ url("sociofamiliar") }}" class="btn btn-primary pull-right">
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
        

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Área socio-familiar</h3>
                </div>
                <form action="{{url('sociofamiliar')}}" method="POST" enctype="multipart/form-data" novalidate>
                    {{csrf_field()}}
                    <div class="card-body">

                        <input type="text" class="form-control" name="estudiante_id"  value="{{ $estudiante->id }}" style="display: none;">

                        <div class="form-group">
                            <label for="relacion_familiar">¿Cómo es tu comunicación y relación con tu grupo
                                familiar?</label>
                            <textarea class="form-control" name="relacion_familiar" rows="3"></textarea>
                            @if ($errors->has('relacion_familiar'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('relacion_familiar') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="relacion_academica">¿Cómo ha sido tu relación en el ámbito académico? <code>(relación interpersonal con estudiantes y profesores)</code> </label>
                            <textarea class="form-control" name="relacion_academica" rows="3"></textarea>
                            @if ($errors->has('relacion_academica'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('relacion_academica') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="tiempo_libre">¿Qué haces en tu tiempo libre?</label>
                            <textarea class="form-control" name="tiempo_libre" rows="3"></textarea>
                            @if ($errors->has('tiempo_libre'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('tiempo_libre') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="actividades_extra_academicas"> ¿Realizas actividades extra-académicas? <code>(Fuera o dentro de la institución)</code> </label>
                            <select class="custom-select form-control-border border-width-2" id="actividades_extra_academicas" name="actividades_extra_academicas" onChange="cualExtra(this.value);">
                                <option disabled selected>Seleccione</option>
                                <option value="0" {{ old('actividades_extra_academicas') =='0' ? 'selected' : '' }} >Si</option>
                                <option value="1" {{ old('actividades_extra_academicas') =='1' ? 'selected' : '' }} >No</option>
                            </select>
                            @if ($errors->has('actividades_extra_academicas'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('actividades_extra_academicas') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-group" id="cuales_actividades_extra_academicas" style="display: none;">
                            <label for="cuales_actividades_extra_academicas"> ¿Cuáles actividades extra-académicas? </label>
                            <textarea class="form-control" name="cuales_actividades_extra_academicas" id="cuales_actividades_extra_academicas" rows="2"></textarea>
                            @if ($errors->has('cuales_actividades_extra_academicas'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('cuales_actividades_extra_academicas') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="destino_beca">En caso de ser aprobado el beneficio, ¿en qué lo utilizaría?</label>
                            <textarea class="form-control" name="destino_beca" rows="3"></textarea>
                            @if ($errors->has('destino_beca'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('destino_beca') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="observaciones_generales"> Observaciones generales durante la entrevista </label>
                            <textarea class="form-control" name="observaciones_generales" rows="3"></textarea>
                            @if ($errors->has('observaciones_generales'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('observaciones_generales') }}
                                </small>
                            @endif
                        </div>

                        
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary pull-center">
                                Registrar
                            </button> 
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->



        


</div>

@section('js')
<script type="text/javascript"> 

    function cualExtra(id){
        if (id == 0) {
            $("#cuales_actividades_extra_academicas").show();
        }
        if (id == 1) {
            $("#cuales_actividades_extra_academicas").hide();
        }
    }
    
</script>
@stop
    

@stop