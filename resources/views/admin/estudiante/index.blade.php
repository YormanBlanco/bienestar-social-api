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
@stop

@section('content')

    <!-- Search form -->
    <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Buscar" aria-label="Search">
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
                <th scope="col">Frecha de registro</th>
                <th colspan="3">Acciones&nbsp; </th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $es)
                <tr>
                    <td> {{ ($estudiantes->currentpage()-1) * $estudiantes->perpage() + $loop->index + 1 }} </td>
                    <td> {{$es->names}} </td>
                    <td> {{$es->lastnames}} </td>
                    <td> {{$es->cedula}} </td>
                    <td> {{$es->age}} </td>
                    <td> {{$es->sex}} </td>
                    <td> {{$es->date_es}} </td>
                    <td> 
                        <a href="{{ url("estudiante/{$es->id}") }}" class="text-primary">
                            <i class="fa fa-eye" aria-hidden="true"> </i>
                        </a>  
                    </td>
                    <td> 
                        <a href="" class="text-info">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                        </a>  
                    </td>
                    <td> 
                        <a href="" class="text-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {!! $estudiantes->links() !!}
    

@stop