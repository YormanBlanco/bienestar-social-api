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
        
        <form action="{{url('sociofamiliar')}}" method="POST" enctype="multipart/form-data" novalidate>
            {{csrf_field()}}
                
            <h2> Área socio-familiar  </h2>
            <br>

            <input type="text" class="form-control" name="estudiante_id"  value="{{ $estudiante->id }}" style="display: none;">

                



        </form>

        


</div>

@section('js')
<script type="text/javascript"> 

    
</script>
@stop
    

@stop