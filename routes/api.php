<?php
use App\Http\Controllers\busControl;
use App\Http\Controllers\routeController;
use App\Http\Controllers\busRouteController;
use App\Http\Controllers\busSeatesController;
use App\Http\Controllers\busScheduleController;
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
//Route::get('/buses' ,[busControl::class, 'index']);
//Route::post('/buses',[busControl::class, 'store']);
Route::get('/buses/search/{name}',[busControl::class, 'search']);
Route::get('/routes/search/{route_number}',[routeController::class, 'search']);
Route::get('/busseats/search/{bus_id}',[busSeatesController::class, 'search']);
Route::get('/busroutes/search/{bus_id}',[busRouteController::class, 'search']);

Route::resource('buses', busControl::class);
Route::resource('routes',routeController::class);
Route::resource('busseats', busSeatesController::class);
Route::resource('busroutes',busRouteController::class);
Route::resource('schedule',busScheduleController::class);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


