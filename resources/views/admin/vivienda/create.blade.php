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

            <div id="ubicacion" class="col-md-12">

                <input type="text" class="form-control" name="estudiante_id"  value="{{ $estudiante->id }}" style="display: none;">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ubicacion">Ubicación de la vivienda</label>
                        <input required type="text" class="form-control" placeholder="Ubicación" id="ubicacion_vivienda" name="ubicacion"  value="{{ old('ubicacion') }}">
                        @if ($errors->has('ubicacion'))
                            <small class="form-text text-danger">
                                {{ $errors->first('ubicacion') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="zona_urbana">¿Zona urbana?</label>
                        <select required name="zona_urbana" id="zona_urbana"  class="form-control" onChange="zonaUrbana(this.value);">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('zona_urbana') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('zona_urbana') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('zona_urbana'))
                            <small class="form-text text-danger">
                                {{ $errors->first('zona_urbana') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="zona_urbana_tipo" style="display: none;">
                        <label for="zona_urbana_tipo">Tipo de zona urbana</label>
                        <select required name="zona_urbana_tipo" class="form-control" >
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('zona_urbana_tipo') =='0' ? 'selected' : '' }} >Urbanización</option>
                            <option value="1" {{ old('zona_urbana_tipo') =='1' ? 'selected' : '' }} >Barrio</option>
                            <option value="3" {{ old('zona_urbana_tipo') =='3' ? 'selected' : '' }} >Sector</option>
                        </select>
                        @if ($errors->has('zona_urbana_tipo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('zona_urbana_tipo') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="zona_rural">¿Zona rural?</label>
                        <select required name="zona_rural" id="zona_rural" class="form-control" onChange="zonaRural(this.value);">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('zona_rural') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('zona_rural') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('zona_rural'))
                            <small class="form-text text-danger">
                                {{ $errors->first('zona_rural') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="zona_rural_tipo" style="display: none;">
                        <label for="zona_rural_tipo">Tipo de zona rural</label>
                        <select required name="zona_rural_tipo" class="form-control" >
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('zona_rural_tipo') =='0' ? 'selected' : '' }} >Caserío</option>
                            <option value="1" {{ old('zona_rural_tipo') =='1' ? 'selected' : '' }} >Finca</option>
                            <option value="3" {{ old('zona_rural_tipo') =='3' ? 'selected' : '' }} >Conuco</option>
                            <option value="4" {{ old('zona_rural_tipo') =='4' ? 'selected' : '' }} >Parcela</option>
                        </select>
                        @if ($errors->has('zona_rural_tipo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('zona_rural_tipo') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="zona_industrial">¿Zona industrial?</label>
                        <select required name="zona_industrial" id="zona_industrial" class="form-control" onChange="zonaIndustrial(this.value);">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('zona_industrial') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('zona_industrial') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('zona_industrial'))
                            <small class="form-text text-danger">
                                {{ $errors->first('zona_industrial') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="zona_industrial_tipo" style="display: none;">
                        <label for="zona_industrial_tipo">Tipo de zona industrial</label>
                        <select required name="zona_industrial_tipo" class="form-control" >
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('zona_industrial_tipo') =='0' ? 'selected' : '' }} >Casa</option>
                            <option value="1" {{ old('zona_industrial_tipo') =='1' ? 'selected' : '' }} >Galpón</option>
                        </select>
                        @if ($errors->has('zona_industrial_tipo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('zona_industrial_tipo') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="tipo_vivienda">Tipo de vivienda</label>
                        <select required name="tipo_vivienda" id="tipo_vivienda" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('tipo_vivienda') =='0' ? 'selected' : '' }} >Casa</option>
                            <option value="1" {{ old('tipo_vivienda') =='1' ? 'selected' : '' }} >Quinta</option>
                            <option value="3" {{ old('tipo_vivienda') =='3' ? 'selected' : '' }} >Apartamento</option>
                            <option value="4" {{ old('tipo_vivienda') =='4' ? 'selected' : '' }} >Rancho</option>
                        </select>
                        @if ($errors->has('tipo_vivienda'))
                            <small class="form-text text-danger">
                                {{ $errors->first('tipo_vivienda') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tenencia_vivienda">Tenencia</label>
                        <select required name="tenencia_vivienda" id="tenencia_vivienda" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('tenencia_vivienda') =='0' ? 'selected' : '' }} >Propia</option>
                            <option value="1" {{ old('tenencia_vivienda') =='1' ? 'selected' : '' }} >Alquilada</option>
                            <option value="3" {{ old('tenencia_vivienda') =='3' ? 'selected' : '' }} >Prestada</option>
                        </select>
                        @if ($errors->has('tenencia_vivienda'))
                            <small class="form-text text-danger">
                                {{ $errors->first('tenencia_vivienda') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="construccion">Construcción</label>
                        <select required name="construccion" id="construccion" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('construccion') =='0' ? 'selected' : '' }} >Paredes</option>
                            <option value="1" {{ old('construccion') =='1' ? 'selected' : '' }} >Techo</option>
                            <option value="3" {{ old('construccion') =='3' ? 'selected' : '' }} >Piso</option>
                        </select>
                        @if ($errors->has('construccion'))
                            <small class="form-text text-danger">
                                {{ $errors->first('construccion') }}
                            </small>
                        @endif
                    </div>
                </div>

                <!-- Boton continuar -->
                <br>
                <div class="form-row">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-secondary pull-center" id="continuar" onclick="continuar()">
                            <i class="fa fa-arrow-right" aria-hidden="true">  </i>
                            Siguiente página
                        </button> 
                    </div>
                </div>
                <br>
                <br>
            
            </div>     

            <div id="condiciones_alojamiento" class="col-md-12" style="display: none;">

                <h2> Condiciones de alojamiento </h2>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="habitaciones">¿Cuantas habitaciones?</label>
                        <input required type="text" class="form-control" placeholder="Habitaciones"  name="habitaciones"  value="{{ old('habitaciones') }}">
                        @if ($errors->has('habitaciones'))
                            <small class="form-text text-danger">
                                {{ $errors->first('habitaciones') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="cocina">Cocina</label>
                        <select required name="cocina" id="cocina" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('cocina') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('cocina') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('cocina'))
                            <small class="form-text text-danger">
                                {{ $errors->first('cocina') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="comedor">Comedor</label>
                        <select required name="comedor" id="comedor" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('comedor') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('comedor') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('comedor'))
                            <small class="form-text text-danger">
                                {{ $errors->first('comedor') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="sala">Sala</label>
                        <select required name="sala" id="sala" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('sala') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('sala') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('sala'))
                            <small class="form-text text-danger">
                                {{ $errors->first('sala') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="salacomedor">Sala comedor</label>
                        <select required name="salacomedor" id="salacomedor" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('salacomedor') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('salacomedor') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('salacomedor'))
                            <small class="form-text text-danger">
                                {{ $errors->first('salacomedor') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="baño">Baño</label>
                        <select required name="baño" id="baño" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('baño') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('baño') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('baño'))
                            <small class="form-text text-danger">
                                {{ $errors->first('baño') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="patio">Patio</label>
                        <select required name="patio" id="patio" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('patio') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('patio') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('patio'))
                            <small class="form-text text-danger">
                                {{ $errors->first('patio') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="total_ambientes">¿Cuantos ambientes?</label>
                        <input required type="text" class="form-control" placeholder="¿Cuantos ambientes?" id="total_ambientes"  name="total_ambientes"  value="{{ old('total_ambientes') }}">
                        @if ($errors->has('total_ambientes'))
                            <small class="form-text text-danger">
                                {{ $errors->first('total_ambientes') }}
                            </small>
                        @endif
                    </div>
                </div>


                <!-- Boton continuar -->
                <br>
                <div class="form-row">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-secondary pull-center" id="regresar" onclick="regresar()">
                            <i class="fa fa-arrow-left" aria-hidden="true">  </i>
                            Anterior página
                        </button> 
                        <button type="button" class="btn btn-secondary pull-center" id="continuar2" onclick="continuar2()">
                            <i class="fa fa-arrow-right" aria-hidden="true">  </i>
                            Siguiente página
                        </button> 
                    </div>
                </div>
                <br>
                <br>
            
            </div>    

            <div id="eseneres" class="col-md-12" style="display: none;">

                <h2> Eseneres de la vivienda </h2>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="juego_de_sala">Juego de sala</label>
                        <select required name="juego_de_sala" id="juego_de_sala" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('juego_de_sala') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('juego_de_sala') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('juego_de_sala'))
                            <small class="form-text text-danger">
                                {{ $errors->first('juego_de_sala') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="juego_de_comedor">Juego de comedor</label>
                        <select required name="juego_de_comedor" id="juego_de_comedor" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('juego_de_comedor') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('juego_de_comedor') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('juego_de_comedor'))
                            <small class="form-text text-danger">
                                {{ $errors->first('juego_de_comedor') }}
                            </small>
                        @endif
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="camas">¿Cuantas camas?</label>
                        <input required type="text" class="form-control" placeholder="¿Cuantas camas?"  name="camas"  value="{{ old('camas') }}">
                        @if ($errors->has('camas'))
                            <small class="form-text text-danger">
                                {{ $errors->first('camas') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="ventiladores">¿Cuantos ventiladores?</label>
                        <input required type="text" class="form-control" placeholder="¿Cuantos ventiladores?"  name="ventiladores"  value="{{ old('ventiladores') }}">
                        @if ($errors->has('ventiladores'))
                            <small class="form-text text-danger">
                                {{ $errors->first('ventiladores') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="neveras">¿Cuantas neveras?</label>
                        <input required type="text" class="form-control" placeholder="¿Cuantas neveras?"  name="neveras"  value="{{ old('neveras') }}">
                        @if ($errors->has('neveras'))
                            <small class="form-text text-danger">
                                {{ $errors->first('neveras') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="televisor">¿Cuantos televisores?</label>
                        <input required type="text" class="form-control" placeholder="¿Cuantos televisores?"  name="televisor"  value="{{ old('televisor') }}">
                        @if ($errors->has('televisor'))
                            <small class="form-text text-danger">
                                {{ $errors->first('televisor') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="microondas">Microondas</label>
                        <select required name="microondas" id="microondas" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('microondas') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('microondas') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('microondas'))
                            <small class="form-text text-danger">
                                {{ $errors->first('microondas') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="computadora">Computadora</label>
                        <select required name="computadora" id="computadora" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('computadora') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('computadora') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('computadora'))
                            <small class="form-text text-danger">
                                {{ $errors->first('computadora') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="radio_equipo">Radio o equipo</label>
                        <select required name="radio_equipo" id="radio_equipo" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('radio_equipo') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('radio_equipo') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('radio_equipo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('radio_equipo') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lavadora">Lavadora</label>
                        <select required name="lavadora" id="lavadora" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('lavadora') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('lavadora') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('lavadora'))
                            <small class="form-text text-danger">
                                {{ $errors->first('lavadora') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="secadora">Secadora</label>
                        <select required name="secadora" id="secadora" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('secadora') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('secadora') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('secadora'))
                            <small class="form-text text-danger">
                                {{ $errors->first('secadora') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="calentador">Calentador</label>
                        <select required name="calentador" id="calentador" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('calentador') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('calentador') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('calentador'))
                            <small class="form-text text-danger">
                                {{ $errors->first('calentador') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="licuadora">Licuadora</label>
                        <select required name="licuadora" id="licuadora" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('licuadora') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('licuadora') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('licuadora'))
                            <small class="form-text text-danger">
                                {{ $errors->first('licuadora') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="extractor_jugo">Extractor de jugo</label>
                        <select required name="extractor_jugo" id="extractor_jugo" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('extractor_jugo') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('extractor_jugo') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('extractor_jugo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('extractor_jugo') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="cafetera">Cafetera</label>
                        <select required name="cafetera" id="cafetera" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('cafetera') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('cafetera') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('cafetera'))
                            <small class="form-text text-danger">
                                {{ $errors->first('cafetera') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    

                    <div class="form-group col-md-6">
                        <label for="celular">Celular</label>
                        <select required name="celular" id="celular" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('celular') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('celular') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('celular'))
                            <small class="form-text text-danger">
                                {{ $errors->first('celular') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="aire_acondicionado">Aire Acondicionado</label>
                        <select required name="aire_acondicionado" id="aire_acondicionado" class="form-control">
                            <option disabled selected>Seleccione</option>
                            <option value="0" {{ old('aire_acondicionado') =='0' ? 'selected' : '' }} >Si</option>
                            <option value="1" {{ old('aire_acondicionado') =='1' ? 'selected' : '' }} >No</option>
                        </select>
                        @if ($errors->has('aire_acondicionado'))
                            <small class="form-text text-danger">
                                {{ $errors->first('aire_acondicionado') }}
                            </small>
                        @endif
                    </div>

                </div>


                <!-- Boton continuar -->
                <br>
                <div class="form-row">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-secondary pull-center" id="regresar2" onclick="regresar2()">
                            <i class="fa fa-arrow-left" aria-hidden="true">  </i>
                            Anterior página
                        </button> 
                        <button type="button" class="btn btn-secondary pull-center" id="continuar3" onclick="continuar3()">
                            <i class="fa fa-arrow-right" aria-hidden="true">  </i>
                            Siguiente página
                        </button> 
                    </div>
                </div>
                <br>
                <br>
            
            </div>       

        </form>

        


</div>

@section('js')
<script type="text/javascript"> 

    //continuar a 2da página
    var continuar = document.getElementById('continuar');
    continuar.onclick = function(){
        if(
            $("#ubicacion_vivienda").val() == '' || $("#zona_urbana").val() == null || $("#zona_rural").val() == null 
            || $("#zona_industrial").val() == null || $("#tipo_vivienda").val() == null || $("#tenencia_vivienda").val() == null
            || $("#construccion").val() == null
        ){
            Swal.fire({
                type: 'error',
                title: 'Ups...',
                text: 'No puedes dejar campos vacíos',
            })
        }
        else{
            $("#ubicacion").hide();
            $("#condiciones_alojamiento").show();
        }
        
    }
    //regresar primera pagina
    var regresar = document.getElementById('regresar');
    regresar.onclick = function(){
        $("#condiciones_alojamiento").hide();
        $("#ubicacion").show();    
    }

    //continuar a 3era página
    var continuar2 = document.getElementById('continuar2');
    continuar2.onclick = function(){
        if(
            $("#habitaciones").val() == '' || $("#cocina").val() == null || $("#comedor").val() == null 
            || $("#sala").val() == null || $("#salacomedor").val() == null || $("#baño").val() == null
            || $("#patio").val() == null || $("#total_ambientes").val() == ''
        ){
            Swal.fire({
                type: 'error',
                title: 'Ups...',
                text: 'No puedes dejar campos vacíos',
            })
        }
        else{
            $("#ubicacion").hide();
            $("#condiciones_alojamiento").hide();
            $("#eseneres").show();
        }
        
    }
    //regresar 2da pagina
    var regresar2 = document.getElementById('regresar2');
    regresar2.onclick = function(){        
        $("#ubicacion").hide(); 
        $("#condiciones_alojamiento").show();  
        $("#eseneres").hide();  
    }

    function zonaUrbana(id) {
        if (id == 0) {
            $("#zona_urbana_tipo").show();
            $("#zona_urbana_tipo").show();
        }

        if (id == 1) {
            $("#zona_urbana_tipo").hide();
            $("#zona_urbana_tipo").hide();
        }
    }

    function zonaRural(id) {
        if (id == 0) {
            $("#zona_rural_tipo").show();
            $("#zona_rural_tipo").show();
        }

        if (id == 1) {
            $("#zona_rural_tipo").hide();
            $("#zona_rural_tipo").hide();
        }
    }

    function zonaIndustrial(id) {
        if (id == 0) {
            $("#zona_industrial_tipo").show();
            $("#zona_industrial_tipo").show();
        }

        if (id == 1) {
            $("#zona_industrial_tipo").hide();
            $("#zona_industrial_tipo").hide();
        }
    }


    
</script>
@stop
    

@stop