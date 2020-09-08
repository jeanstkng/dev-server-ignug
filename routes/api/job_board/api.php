<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobBoard\OfferController;
use Carbon\Carbon;
use App\Models\JobBoard\Category;
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

// Rutas ofertas
Route::group(['prefix' => 'offers'], function () {
    // Route::group(['middleware' => 'auth:api'], function () {
        Route::put('', 'JobBoard\OfferController@update');
        Route::delete('', 'JobBoard\OfferController@destroy');
        Route::get('/all', 'JobBoard\OfferController@getAllOffers'); // Trae todas las ofertas.
        Route::get('/opportunities', 'JobBoard\OfferController@getOffers'); // Trae todas las ofertas con filtros
        Route::post('/filter', 'JobBoard\OfferController@filterOffers'); // Filtra las ofertas segun el buscador.

        // Route::get('/professionals', 'OfferController@getAppliedProfessionals');
        Route::get('/opportunities/validateAppliedOffer', 'JobBoard\OfferController@validateAppliedOffer');//valida si ya postulo a la oferta
        Route::post('/opportunities/apply', 'JobBoard\OfferController@applyOffer');//aplicar a la oferta

        // Estos metodo de traer todos los profesionales y companies no nos corresponde como tal,
        // Preguntar al ing
        // Route::get('/opportunities/filter', 'OfferController@filterOffersFields');

    // });
});

Route::apiResource('offers', 'JobBoard\OfferController');

// Total de Empresas, Profesionales y Ofertas
Route::get('/total', function () {
    $now = Carbon::now();
    $totalCompanies = \App\Models\JobBoard\Company::where('state_id', 1)->count();
    $totalProfessionals = \App\Models\JobBoard\Professional::where('state_id', 1)->count();
    $totalOffers = \App\Models\JobBoard\Offer::where('state_id', 1)
        ->where('finish_date', '>=', $now->format('Y-m-d'))
        ->where('start_date', '<=', $now->format('Y-m-d'))
        ->count();
    return response()->json(['totalCompanies' => $totalCompanies, 'totalOffers' => $totalOffers, 'totalProfessionals' => $totalProfessionals ], 200);
});



Route::group(['prefix' => 'categories'], function () {
    Route::get('', 'JobBoard\CategoryController@index');
});
