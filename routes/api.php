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

Route::get('/regions', 'App\Http\Controllers\ServerController@getRegions');
Route::get('/plans', 'App\Http\Controllers\ServerController@getPlans');
Route::get('/servers', 'App\Http\Controllers\ServerController@getServers');
Route::post('/add-server', 'App\Http\Controllers\ServerController@createServer');
