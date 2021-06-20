<?php
use App\Http\Controllers\busControl;
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

Route::resource('buses', busControl::class);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


