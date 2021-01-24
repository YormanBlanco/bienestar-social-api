<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//Estudiante
Route::resource('estudiante', 'EstudianteController');

//Familia
Route::resource('family', 'FamilyController');
//Area socioeconomica
Route::get('socioeconomic/getfamily/{estudiante_id}', 'SocioEconomicController@getFamilyByEstudianteId')->name('getFamilyByEstudianteId');
Route::resource('socioeconomic', 'SocioEconomicController');

//Egresos
Route::resource('egresos', 'EgresosController');

//Vivienda
Route::resource('vivienda', 'ViviendaController');

//SaludEstudiante
Route::resource('saludestudiante', 'SaludEstudianteController');

//SocioFamiliar
Route::resource('sociofamiliar', 'SocioFamiliarController');

//Trabajador social
Route::resource('trabajadorsocial', 'TrabajadorSocialController');

//Solicitud Beca
Route::resource('solicitud', 'SolicitudBecaController');
