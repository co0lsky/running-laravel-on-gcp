<?php

use Illuminate\Http\Request;

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

Route::get('/{id}', 'GetTracker');
Route::post('/{id}', 'UpdateLocation');

Route::get('/{id}/trackings', 'ListTracking');
Route::post('/{id}/trackings', 'AddTracking');


Route::get('/mm/list', 'MM\Listing');
Route::post('/mm/upload', 'MM\Upload');
