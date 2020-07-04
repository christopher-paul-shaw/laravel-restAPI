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

Route::get('/', function () {
	return response()->json([
		"message" => "API Root"
	], 200);
});

Route::get('/contractor/{id?}', function ($id=false) {
	$contactor = \App\Contractor::find($id);
	if (!$contactor) {
		return response()->json([
			"message" => "Contractor Not Found"
		],404);
	}

	return response()->json([
		"name" => $contactor->name,
		"contactNumber" => $contactor->contactNumber,
	], 200);
});
