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
