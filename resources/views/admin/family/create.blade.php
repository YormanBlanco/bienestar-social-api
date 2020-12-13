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

            <!-- Button Agregar detalle-->
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="form-group">
                                <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
             <!-- Tabla -->
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                     <thead style="background-color:#A9D0F5">
                         <th>Opciones</th>
                         <th>Artículo</th>
                         <th>Cantidad</th>
                         <th>Precio de venta</th>
                         <th>Monto descontado</th>
                         <th>Subtotal</th>
                     </thead>
                     <tfoot>
                         <th>TOTAL</th>
                         <th></th>
                         <th></th>
                         <th></th>
                         <th></th>
                         <th>
                             <h4 id="total">$ 0.00 </h4> <input type="hidden" name="total_venta" id="total_venta">
                         </th>
                     </tfoot>
                     <tbody>

                     </tbody>
                 </table>
             </div>

        </form>

    @endif
</div>



@stop

