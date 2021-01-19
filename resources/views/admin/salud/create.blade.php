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

                





        </form>

        


</div>

@section('js')
<script type="text/javascript"> 

    
</script>
@stop
    

@stop