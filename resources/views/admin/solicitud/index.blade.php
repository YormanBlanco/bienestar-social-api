@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header')
    <h1>
        Solictudes de beca
        <a href="{{ url("estudiante/create") }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus" aria-hidden="true">  </i>
            Nuevo
        </a>
    </h1>

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
                <th scope="col">Código</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Trabajador</th>
                <th scope="col">Status</th>
                <th scope="col">Fecha de registro</th>
                <th colspan="2">Acciones&nbsp; </th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $sol)
                <tr>
                    <td> {{ ($solicitudes->currentpage()-1) * $solicitudes->perpage() + $loop->index + 1 }} </td>
                    <td> {{$sol->uuid}} </td>
                    <td> {{$sol->estudiante->names}} {{$sol->estudiante->lastnames}} </td>
                    <td> {{$sol->trabajador_social->names}} {{$sol->trabajador_social->lastnames}}  </td>
                    <td> @if($sol->status == 0) En revisión @endif @if($sol->status == 1) Aprobada @endif @if($sol->status == 2) Rechazada @endif </td>
                    <td> {{$sol->created}} </td>
                    <td> 
                        <a title="Ver" href="" class="text-primary">
                            <i class="fa fa-eye" aria-hidden="true"> </i>
                        </a>  
                    </td>
                    <td> 
                        <a title="Actualizar" href="" class="text-info">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                        </a>  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {!! $solicitudes->links() !!}
    

@stop