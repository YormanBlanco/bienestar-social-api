<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::group(['middleware' => 'api'], function () {

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





});*/
