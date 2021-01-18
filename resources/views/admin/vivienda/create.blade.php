@extends('adminlte::page')

@section('title', 'Área socio económica')

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
        
        <form action="{{url('vivienda')}}" method="POST" enctype="multipart/form-data" novalidate>
            {{csrf_field()}}
                
            <h2> Área físico-ambiental  </h2>
            <br>

            <div class="col-md-12">

                <input type="text" class="form-control" name="estudiante_id"  value="{{ $estudiante->id }}" style="display: none;">

                

                <!-- Boton registrar -->
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

        


</div>

@section('js')
    <script type="text/javascript">   
    
    </script>
@stop
    

@stop