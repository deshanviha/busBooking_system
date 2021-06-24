<?php
use App\Http\Controllers\busControl;
use App\Http\Controllers\routeController;
use App\Http\Controllers\busRouteController;
use App\Http\Controllers\busSeatesController;
use App\Http\Controllers\busScheduleController;
use App\Http\Controllers\userController;
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



//public route
Route::get('/buses/search/{name}',[busControl::class, 'search']);
Route::get('/buses/{id}',[busControl::class, 'show']);
Route::get('/buses',[busControl::class, 'index']);



Route::get('/routes/search/{route_number}',[routeController::class, 'search']);
Route::get('/routes/{id}',[routeController::class, 'show']);
Route::get('/routes',[routeController::class, 'index']);



Route::get('/busseats/search/{bus_id}',[busSeatesController::class, 'search']);
Route::get('/busseats/{id}',[busSeatesController::class, 'show']);
Route::get('/busseats' ,[busSeatesController::class, 'index']);


Route::get('/busroutes/search/{bus_id}',[busRouteController::class, 'search']);
Route::get('/busroutes/{id}',[busRouteController::class, 'show']);
Route::get('/busroutes',[busRouteController::class, 'index']);


Route::get('/schedule/{id}',[busScheduleController::class, 'show']);
Route::get('/schedule',[busScheduleController::class, 'index']);


Route::post('/register',[userController::class, 'register']);
Route::post('/login',[userController::class, 'login']);






//Route::resource('buses', busControl::class);
//Route::resource('routes',routeController::class);
//Route::resource('busseats', busSeatesController::class);
//Route::resource('busroutes',busRouteController::class);
//Route::resource('schedule',busScheduleController::class);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//protected route
Route::group(['middleware'=>['auth:sanctum']], function () {

    Route::post('/buses',[busControl::class, 'store']);
    Route::put('/buses/{id}',[busControl::class, 'update']);
    Route::delete('/buses/{id}',[busControl::class, 'destroy']);


    Route::post('/routes',[routeController::class, 'store']);
    Route::put('/routes/{id}',[routeController::class, 'update']);
    Route::delete('/routes/{id}',[routeController::class, 'destroy']);


    Route::post('/busseats',[busSeatesController::class, 'store']);
    Route::put('/busseats/{id}',[busSeatesController::class, 'update']);
    Route::delete('/busseats/{id}',[busSeatesController::class, 'destroy']);


    Route::post('/busroutes',[busRouteController::class, 'store']);
    Route::put('/busroutes/{id}',[busRouteController::class, 'update']);
    Route::delete('/busroutes/{id}',[busRouteController::class, 'destroy']);


    Route::post('/schedule',[busScheduleController::class, 'store']);
    Route::put('/schedule/{id}',[busScheduleController::class, 'update']);
    Route::delete('/schedule/{id}',[busScheduleController::class, 'destroy']);

    Route::post('/logout',[userController::class, 'logout']);
    Route::put('/changePassword/{id}',[userController::class, 'changePassword']);


});

