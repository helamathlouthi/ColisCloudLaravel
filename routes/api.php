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

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
   
    Route::get('/profile', function(Request $request) {  return auth()->user(); });
    Route::get('/profile/{id}', function(Request $request) {  return auth()->user(); }); 
    
    Route::post('/setReclamation',[App\Http\Controllers\ReclamationsController::class, 'Store']);

    Route::get('/getClients',[App\Http\Controllers\API\Clients::class, 'Lists']);
    Route::get('/getClient/{id}',[App\Http\Controllers\API\Clients::class, 'Client']);
    
    Route::get('/getColis',[App\Http\Controllers\API\Colis::class, 'Lists']);
    Route::get('/getColi/{id}',[App\Http\Controllers\API\Colis::class, 'Coli']);
    Route::get('/setColisStatut/{id}',[App\Http\Controllers\API\Colis::class, 'SetColisStatut']);
    Route::get('/searchColis/{statut}/{name}',[App\Http\Controllers\API\Colis::class, 'searchColis']);
    Route::get('/searchColis/{statut}',[App\Http\Controllers\API\Colis::class, 'searchColis']);
  
    
    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});