@extends('adminlte::page')

@section('title', 'Área socio económica')

@section('content_header')

    <h1>       
        <a href="{{ url("family") }}" class="btn btn-primary pull-right">
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
        
        <form action="{{url('egresos')}}" method="POST" enctype="multipart/form-data" novalidate>
            {{csrf_field()}}
                
            <h2> Egresos del grupo familiar </h2>
            <br>

            <div class="col-md-12">

                <input type="text" class="form-control" name="estudiante_id"  value="{{ $estudiante->id }}" style="display: none;">
                <input type="text" class="form-control" name="total_ingresos"  value="{{ $total_ingresos }}" style="display: none;">

                <div class="form-row">
                    

                    <div class="form-group col-md-4">
                      <label for="vivienda">Tipo de vivienda</label>
                        <select required id="vivienda" name="vivienda" class="form-control" value="{{ old('vivienda') }}" >
                            <option disabled selected>Seleccione</option>                                                    
                            <option value="0" {{ old('vivienda') == '0' ? 'selected' : '' }} >Propia</option>
                            <option value="1" {{ old('vivienda') == '1' ? 'selected' : '' }} >Alquilada</option>
                        </select>
                        @if ($errors->has('vivienda'))
                            <small class="form-text text-danger">
                                {{ $errors->first('vivienda') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="transporte">Transporte</label>
                        <input required id="transporte" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Transporte" name="transporte" value="{{ old('transporte') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('transporte'))
                            <small class="form-text text-danger">
                                {{ $errors->first('transporte') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tv_cable">TV por cable</label>
                        <input required id="tv_cable" type="text" class="form-control monto" onkeyup="sumar();" placeholder="TV por cable" name="tv_cable" value="{{ old('tv_cable') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('tv_cable'))
                            <small class="form-text text-danger">
                                {{ $errors->first('tv_cable') }}
                            </small>
                        @endif
                    </div>
                    
                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="alimentacion">Alimentación</label>
                        <input required id="alimentacion" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Alimentación" name="alimentacion" value="{{ old('alimentacion') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('alimentacion'))
                            <small class="form-text text-danger">
                                {{ $errors->first('alimentacion') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="salud">Salud</label>
                        <input required id="salud" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Salud" name="salud" value="{{ old('salud') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('salud'))
                            <small class="form-text text-danger">
                                {{ $errors->first('salud') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="otros">Otros</label>
                        <input required id="otros" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Otros" name="otros" value="{{ old('otros') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('otros'))
                            <small class="form-text text-danger">
                                {{ $errors->first('otros') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="educacion">Educación</label>
                        <input required id="educacion" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Educación" name="educacion" value="{{ old('educacion') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('educacion'))
                            <small class="form-text text-danger">
                                {{ $errors->first('educacion') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="aporte_to_family">Aporte familiar</label>
                        <input readonly id="aporte_to_family" type="text" value="{{$aporte_familiar}}" class="form-control" placeholder="Aporte familiar" name="aporte_to_family" >
                        @if ($errors->has('aporte_to_family'))
                            <small class="form-text text-danger">
                                {{ $errors->first('aporte_to_family') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="recreacion">Recreación</label>
                        <input required id="recreacion" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Recreación" name="recreacion" value="{{ old('recreacion') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('recreacion'))
                            <small class="form-text text-danger">
                                {{ $errors->first('recreacion') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="telefono">Teléfono</label>
                        <input required id="telefono" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Teléfono" name="telefono" value="{{ old('telefono') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('telefono'))
                            <small class="form-text text-danger">
                                {{ $errors->first('telefono') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="internet">Internet</label>
                        <input required id="internet" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Internet" name="internet" value="{{ old('internet') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('internet'))
                            <small class="form-text text-danger">
                                {{ $errors->first('internet') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="agua">Agua</label>
                        <input required id="agua" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Agua" name="agua" value="{{ old('agua') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('agua'))
                            <small class="form-text text-danger">
                                {{ $errors->first('agua') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="luz">Luz</label>
                        <input required id="luz" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Luz" name="luz" value="{{ old('luz') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('luz'))
                            <small class="form-text text-danger">
                                {{ $errors->first('luz') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="gas">Gas</label>
                        <input required id="gas" type="text" class="form-control monto" onkeyup="sumar();" placeholder="Gas" name="gas" value="{{ old('gas') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('gas'))
                            <small class="form-text text-danger">
                                {{ $errors->first('gas') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="total_egresos">Total egresos</label>
                        <input readonly id="total_egresos" type="text" class="form-control" value="{{old('total_egresos')}}"  placeholder="" name="total_egresos"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('total_egresos'))
                            <small class="form-text text-danger">
                                {{ $errors->first('total_egresos') }}
                            </small>
                        @endif
                    </div>

                </div>

                <!-- BAR CHART -->
                <br>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Balance Ingresos-Egresos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="content-barchart">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                            </canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

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

    // function formatMount(){
    //     $('input.monto').keyup(function(event) {

    //         // skip for arrow keys
    //         if(event.which >= 37 && event.which <= 40){
    //             event.preventDefault();
    //         }

    //         $(this).val(function(index, value) {
    //             return value
    //                 .replace(/\D/g, "")
    //                 .replace(/([0-9])([0-9]{2})$/, '$1,$2')  
    //                 .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".")
    //             ;
    //         });
    //     });
    // }
    
    //const aporte_to_family = document.getElementById('aporte_to_family');
    //aporte_to_family.value = {{$aporte_familiar}};

    function sumar() {

        const total_egresos = document.getElementById('total_egresos');
        let subtotal = 0;
        [ ...document.getElementsByClassName( "monto" ) ].forEach( function ( element ) {
            if(element.value !== '') {
                subtotal += parseFloat(element.value);
            }
        });


        total_egresos.value = subtotal;
        barChart(total_egresos.value);

    }

    //-------------
    //- BAR CHART -
    //-------------
    function barChart(total_egresos){
        var areaChartData = {
            labels  : ['Dinero'],
            datasets: [
                {
                    label               : 'Egresos',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : [ total_egresos ]
                },
                {
                    label               : 'Ingresos',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [ {{$total_ingresos}} ] 
                },
            ]
        }

        //elimino el antiguo chart
        document.getElementById("barChart").remove();
        //creo el nuevo chart
        var canvas = document.createElement("canvas");
        canvas.id = "barChart"; 
        document.getElementById("content-barchart").appendChild(canvas);

        var barChartCanvas = document.getElementById('barChart').getContext('2d');
        var barChartData = $.extend(true, {}, areaChartData);
        var temp0 = areaChartData.datasets[0];
        var temp1 = areaChartData.datasets[1];
        barChartData.datasets[0] = temp1;
        barChartData.datasets[1] = temp0;

        var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
        }

        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    }
    

    



    
</script>
@stop
    

@stop