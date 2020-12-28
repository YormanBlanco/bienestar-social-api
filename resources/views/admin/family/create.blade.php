@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
    <h1>       
        <a href="{{ url("family") }}" class="btn btn-primary pull-right">
            <i class="fa fa-arrow-left" aria-hidden="true">  </i>
            Volver
        </a>
        Nueva constelación familiar
    </h1>

    
    @if(count($errors))
        <br>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <br>
    @endif

    @if(session('message'))
        <br>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <ul>
                <li>{{session('message')}}</li>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

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
                
            <h2> Constelación familiar de estudiante: {{ $estudiante->names }} {{ $estudiante->lastnames }} </h2>

            <div class="row">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Parentesco</th>
                            <th scope="col">Nivel de instrucción</th>
                            <th scope="col">Profesión u oficio</th>
                            <th scope="col">Ingreso mensual</th>
                            <th scope="col">Aporte al grupo familiar</th>
                            <th colspan="2">Acciones&nbsp; </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>  </td>
                            <td> 
                                <div class="col-xs-12 ">
                                    <input type="text" class="form-control">
                                </div>
                            </td>
                            <td> <input type="text" name="lastnames"> </td>
                            <td> <input type="text" name="sex"> </td>
                            <td> <input type="text" name="edad"> </td>
                            <td> <input type="text" name="parentesco"> </td>
                            <td> <input type="text" name="nivel_instruccion"> </td>
                            <td> <input type="text" name="profecion_oficio"> </td>
                            <td> <input type="text" name="ingreso_mensual"> </td>
                            <td> <input type="text" name="aporte_to_family"> </td>                          
                            <td> 
                                <button title="Eliminar" type="button" class="btn btn-danger" id="delete" onclick="deleteItem()">
                                    <i class="fa fa-minus" aria-hidden="true">  </i>
                                </button>  
                            </td>
                            <td> 
                                <button title="Agregar" type="button" class="btn btn-primary" id="add" onclick="addItem()">
                                    <i class="fa fa-plus" aria-hidden="true">  </i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            

        </form>

    @endif
</div>

<script type="text/javascript">
    
    

</script>

@stop

