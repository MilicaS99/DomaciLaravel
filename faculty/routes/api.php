<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FacultyController;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CityResource;
use App\Http\Resources\FacultyResource;
use App\Models\Faculty;

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

//neke drugacije rute
//Route::get('student/{name?}', function ($name = null) {
  //  return "Hello " . $name;
//});
//Route::get('studentname/{s_name}', function ($name) {
  //  return "Student Name " . $name;
//})->where('s_name', '[A-Za-z]+');


//Route::get('/users', [UserController::class, 'index']);
//Route::get('/users/{id}', [UserController::class, 'show']);
Route::resource('faculties',FacultyController::class);



//za gradove
///sve,pojedinace,update
Route::resource('cities', CityController::class);
//Route::get('/cities', function () {
    //return CityResource::collection(City::all());
//});
//header-accept and x-www-form-urlencoded!
Route::post('/createcity',[CityController::class, 'store']);
Route::get ('cities/search/{name}',[CityController::class,'search']);


//za autentifikaciju
//Route::post('/register',[AuthController::class,'register']);
//Route::post('/login', [AuthController::class, 'login']);

//pristup za samo ulogovanje korisnike
/*Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('faculties', FacultyController::class)->only([ 'store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});*/

//Route::get('/faculties', function () {
  //  return FacultyResource::collection(Faculty::all());
//});

