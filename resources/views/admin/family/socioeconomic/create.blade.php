@extends('adminlte::page')

@section('title', 'Área socio-económica')

@section('content_header')

    <h1>       
        <a href="{{ url("family") }}" class="btn btn-primary pull-right">
            <i class="fa fa-arrow-left" aria-hidden="true">  </i>
            Volver
        </a>
        ¿Quién sufraga los gastos del estudiante?
    </h1>
    

@stop

@section('content')
    
<div class="container">

    @if($msg ?? '')

        @section('js')
            <script type="text/javascript">
                Swal.fire(
                    `{{$msg}}`,
                    '',
                    'success'
                    )

            </script>
        @stop
    @endif
        
        <form action="{{url('socioeconomic')}}" method="POST" enctype="multipart/form-data" novalidate>
            {{csrf_field()}}
                
            <h2> Área socio-económica de estudiante: {{ $estudiante->names }} {{ $estudiante->lastnames }} {{ $estudiante->cedula_tipo }}-{{ $estudiante->cedula }} </h2>
            <br>

            <div class="col-md-12">

                <div class="form-row">
                    <input type="text" class="form-control" name="estudiante_id"  value="{{ $estudiante->id }}" style="display: none;">

                    <div class="form-group col-md-6">
                        <label for="family_id">¿Quién sufraga gastos del estudiante?</label>
                        <select required name="family_id" class="form-control">
                            <option disabled selected>Seleccione</option>
                            @foreach($estudiante->family as $fam)
                                <option value="{{$fam->id}}" > {{ $fam->names }} {{ $fam->lastnames }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('family_id'))
                            <small class="form-text text-danger">
                                {{ $errors->first('family_id') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="monto_aporte">Monto del aporte</label>
                        <input required type="text" class="form-control" placeholder="Monto del aporte" name="monto_aporte" value="{{ old('monto_aporte') }}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        @if ($errors->has('monto_aporte'))
                            <small class="form-text text-danger">
                                {{ $errors->first('monto_aporte') }}
                            </small>
                        @endif
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                      <label for="beca">¿Posee beca?</label>
                        <select required id="beca" name="beca" class="form-control" value="{{ old('beca') }}" onChange="otorgaBeca(this.value);">
                            <option disabled selected>Seleccione</option>                          
                            <option value="1" {{ old('beca') == '1' ? 'selected' : '' }} >No</option>
                            <option value="0" {{ old('beca') == '0' ? 'selected' : '' }} >Si</option>
                        </select>
                        @if ($errors->has('beca'))
                            <small class="form-text text-danger">
                                {{ $errors->first('beca') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group col-md-6" id="organismo_beca" style="display: none;">
                        <label for="organismo_beca">Organismo que le otorgo la beca</label>
                        <input type="text" class="form-control" placeholder=""  name="organismo_beca" value="{{ old('organismo_beca') }}">
                    </div>
                    

                </div>

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


<script type="text/javascript">
    function otorgaBeca(id) {
        if (id == 0) { //si
            $("#organismo_beca").show();
        }
        if (id == 1) { //no
            $("#organismo_beca").hide();
        }
    }
</script>

    

@stop