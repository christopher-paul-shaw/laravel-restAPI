<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;


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


Route::resource('/token', 'TokenController');

Route::middleware(['auth:sanctum'])->group(function () {

	Route::get('/', function (Request $request) {

		return response()->json([
			"message" => "API Root",

		], 200);
	});


	Route::resource('/contractor', 'ContractorController');
	Route::resource('/certification', 'CertificationController');




});



