<?php

use Illuminate\Http\Request;
use App\Models\sensordata;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/sensordata', function() {
//     $data = sensordata::all();
//     return response()->json($data);
// });
// Route::post('/data', [SensorController::class, 'store']); 
// Route::post('/data', 'DataController@storeData');
