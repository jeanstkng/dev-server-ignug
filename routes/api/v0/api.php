<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
Route::get('passwords', function () {
    $users = \App\User::orderBy('id')->get();
    $passwords = array();
    $users2 = array();
    foreach ($users as $user) {
        $passwords[] = \Illuminate\Support\Facades\Hash::make($user->identification);
        $users2[] = $user->first_lastname;
    }
    return response()->json(['users' => $users2, 'passwords' => $passwords]);
});

// Users
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'v0\AuthController@login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'v0\AuthController@logout');
        Route::get('user', 'v0\AuthController@user');
        Route::put('users', 'v0\AuthController@updateUser');
        Route::put('password', 'v0\AuthController@changePassword');
        Route::post('users/avatar', 'v0\AuthController@uploadAvatarUri');
    });
});

// Route::group(['prefix' => 'catalogues'], function () {
//     Route::group(['middleware' => 'auth:api'], function () {
//         Route::get('', 'v0\CatalogueController@filter');
//     });
// });

// Route::group(['prefix' => 'workdays'], function () {
//     Route::group(['middleware' => 'auth:api'], function () {
//         Route::get('all', 'v0\WorkdayController@all');
//         Route::get('current_day', 'v0\WorkdayController@getCurrenDate');
//         Route::post('', 'v0\WorkdayController@store');
//         Route::put('', 'v0\WorkdayController@update');
//         Route::delete('{id}', 'v0\WorkdayController@destroy');
//     });
// });

// Route::group(['prefix' => 'tasks'], function () {
//     Route::group(['middleware' => 'auth:api'], function () {
//         Route::get('all', 'v0\TaskController@all');
//         Route::get('catalogues', 'v0\TaskController@allCatalogues');
//         Route::get('current_day', 'v0\TaskController@getCurrenDate');
//         Route::get('history', 'v0\TaskController@getHistory');
//         Route::post('', 'v0\TaskController@store');
//         Route::put('', 'v0\TaskController@update');
//         Route::delete('{id}', 'v0\TaskController@destroy');
//     });
// });

// Route::group(['prefix' => 'attendances'], function () {
//     Route::group(['middleware' => 'auth:api'], function () {
//         Route::get('summary', 'v0\AttendanceController@summary');
//         Route::get('detail', 'v0\AttendanceController@detail');
//         Route::get('{id}', 'v0\AttendanceController@show');
//         Route::post('', 'v0\AttendanceController@store');
//         Route::put('', 'v0\AttendanceController@update');
//         Route::delete('{id}', 'v0\AttendanceController@destroy');
//     });
// });

// Route::group(['prefix' => 'institutions'], function () {

//     Route::group(['middleware' => 'auth:api'], function () {

//     });
// });

// Route::apiResource('institutions', 'v0\InstitutionController');

// Rutas ofertas
Route::group(['prefix' => 'offers'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('', 'OfferController@getAllOffers'); // Trae todas las ofertas.
        Route::get('/opportunities', 'OfferController@getOffers'); // Trae todas las ofertas con filtros

        Route::get('/totalOffers', 'OfferController@getTotalOffers'); // Cuenta todas las ofertas.
        Route::post('/filter', 'OfferController@filterOffers'); // Filtra las ofertas segun el buscador.

        // Route::get('/professionals', 'OfferController@getAppliedProfessionals');
        // Route::get('/opportunities/validateAppliedOffer', 'OfferController@validateAppliedOffer');
        // Route::post('/opportunities/apply', 'OfferController@applyOffer');

        // Estos metodo de traer todos los profesionales y companies no nos corresponde como tal,
        // Preguntar al ing
        Route::get('/totalProfessionals', 'ProfessionalController@getTotalProfessionals'); 
        Route::get('/totalCompanies', 'CompanyController@getTotalCompanies');

        // Route::get('/opportunities/filter', 'OfferController@filterOffersFields');

    });
});