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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Users
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'v0\AuthController@login');
    Route::put('users', 'v0\AuthController@updateUser');
    Route::post('users/avatar', 'v0\AuthController@uploadAvatarUri');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'v0\AuthController@logout');
        Route::get('user', 'v0\AuthController@user');
    });
});

Route::group(['prefix' => 'docentes'], function () {
    Route::get('asistencia_laboral', 'v0\DocenteController@obtenerJornadaLaboralDiaria');
    Route::get('asistencia_laboral/todos', 'v0\DocenteController@obtenerJornadaLaboralTodos');
    Route::get('asistencia_laboral/reportes/jornadas', 'v0\DocenteController@exportarJornadasDocente');
    Route::post('asistencia_laboral', 'v0\DocenteController@inicarActividad');
    Route::put('asistencia_laboral', 'v0\DocenteController@actualizarActividad');
    Route::delete('asistencia_laboral', 'v0\DocenteController@eliminarActividad');
    Route::post('asistencia_laboral/finalizar', 'v0\DocenteController@finalizarActividad');
    Route::post('actividades', 'v0\DocenteController@crearActividad');
    Route::get('actividades', 'v0\DocenteController@obtenerActividades');
    Route::group(['middleware' => 'auth:api'], function () {

    });
});

Route::group(['prefix' => 'catalogos'], function () {
    Route::get('', 'v0\CatalogoController@obtenerCatalogos');
    Route::group(['middleware' => 'auth:api'], function () {

    });
});
