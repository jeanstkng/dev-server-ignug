<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobBoard\OfferController;

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
        Route::get('', 'JobBoard\OfferController@getAllOffers'); // Trae todas las ofertas.
        Route::get('/opportunities', 'JobBoard\OfferController@getOffers'); // Trae todas las ofertas con filtros

        Route::get('/totalOffers', 'JobBoard\OfferController@getTotalOffers'); // Cuenta todas las ofertas.
        Route::post('/filter', 'JobBoard\OfferController@filterOffers'); // Filtra las ofertas segun el buscador.

        // Route::get('/professionals', 'OfferController@getAppliedProfessionals');
        Route::get('/opportunities/validateAppliedOffer', 'JobBoard\OfferController@validateAppliedOffer');
        Route::post('/opportunities/apply', 'JobBoard\OfferController@applyOffer');

        // Estos metodo de traer todos los profesionales y companies no nos corresponde como tal,
        // Preguntar al ing
        Route::get('/totalProfessionals', 'JobBoard\ProfessionalController@getTotalProfessionals'); 
        Route::get('/totalCompanies', 'JobBoard\CompanyController@getTotalCompanies');

        // Route::get('/opportunities/filter', 'OfferController@filterOffersFields');

    // });
});
