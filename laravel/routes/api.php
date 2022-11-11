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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace("App\\Http\\Controllers")->group(function () {
	Route::get("/GceCaracteristicas", "GceCaracteristicasController@index");
	Route::get("/GceCaracteristicas/{id}", "GceCaracteristicasController@indexById");
	Route::get("/cambiarEstado/{id}", "GceCaracteristicasController@cambiarEstado");
	Route::get("/delete/{id}", "GceCaracteristicasController@delete");



	Route::post("/GceCaracteristicas", "GceCaracteristicasController@storage");
	Route::put("/GceCaracteristicas", "GceCaracteristicasController@update");

});