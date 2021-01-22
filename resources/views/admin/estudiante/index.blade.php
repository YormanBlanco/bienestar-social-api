@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
    <h1>
        Estudiantes 
        <a href="{{ url("estudiante/create") }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus" aria-hidden="true">  </i>
            Nuevo
        </a>
    </h1>

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

    <!-- mensaje de eliminacion -->
    @if(session('delete'))
        <br>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <ul>
                <li>{{session('delete')}}</li>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <br>
    @endif

    <!-- mensaje de actualizacion -->
    @if(session('edit'))
        <br>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <ul>
                <li>{{session('edit')}}</li>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <br>
    @endif

@stop

@section('content')

    <!-- Search form -->
    <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input name="search" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Buscar" aria-label="Search">
    </form>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">CI</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col">Fecha de registro</th>
                <th colspan="2">Acciones&nbsp; </th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $es)
                <tr>
                    <td> {{ ($estudiantes->currentpage()-1) * $estudiantes->perpage() + $loop->index + 1 }} </td>
                    <td> {{$es->names}} </td>
                    <td> {{$es->lastnames}} </td>
                    <td> {{$es->cedula_tipo}}-{{$es->cedula}} </td>
                    <td> {{$es->age}} </td>
                    <td> {{$es->sex}} </td>
                    <td> {{$es->created}} </td>
                    <td> 
                        <a title="Ver" href="{{ url("estudiante/{$es->id}") }}" class="text-primary">
                            <i class="fa fa-eye" aria-hidden="true"> </i>
                        </a>  
                    </td>
                    <td> 
                        <a title="Actualizar" href="{{ url("estudiante/{$es->id}/edit") }}" class="text-info">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                        </a>  
                    </td>
                    <!-- <td> 
                        <a title="Eliminar" class="text-danger" data-toggle="modal" data-target="#modal-delete-{{$es->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>  
                    </td> -->
                </tr>
                <!-- @include('admin.estudiante.modal-delete') -->
            @endforeach
        </tbody>
    </table>
    
    {!! $estudiantes->links() !!}
    

@stop