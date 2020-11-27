@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
    <h1>Estudiantes</h1>
@stop

@section('content')
    @foreach($estudiantes as $es)
        <ul>
            <li> Nombres: {{$es->names}} </li>
            <li> Apellidos: {{$es->lastnames}} </li>
            <li> CI: {{$es->cedula}} </li>
            <li> Edad: {{$es->age}} </li>
            <li> Sexo: {{$es->sex}} </li>
            <li> Fecha de creación: {{$es->date_es}} </li>
        </ul>
    @endforeach

@stop