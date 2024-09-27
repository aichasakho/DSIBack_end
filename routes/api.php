<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});


// Les routes d'authentification
Route::post('login', [\App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('logout', [\App\Http\Controllers\Api\UserController::class, 'logout']);
Route::post('register-client', [\App\Http\Controllers\Api\UserController::class, 'addClient']);
Route::post('register-proprietaire', [\App\Http\Controllers\Api\UserController::class, 'addProprietaire']);

// Rooutes for users
Route::get('users', [\App\Http\Controllers\Api\UserController::class, 'index']);
Route::get('users/{id}', [\App\Http\Controllers\Api\UserController::class, 'show']);
Route::put('users/{id}', [\App\Http\Controllers\Api\UserController::class, 'update']);
Route::delete('users/{id}', [\App\Http\Controllers\Api\UserController::class, 'delete']);
Route::get('users/get/proprietaires', [\App\Http\Controllers\Api\UserController::class, 'getProrietaires']);
Route::get('users/get/clients', [\App\Http\Controllers\Api\UserController::class, 'getClients']);

Route::get('annonces', [\App\Http\Controllers\Api\AnnonceController::class, 'index']);
Route::get('locationAnnonce', [\App\Http\Controllers\Api\AnnonceController::class, 'location']);
Route::get('venteAnnonce', [\App\Http\Controllers\Api\AnnonceController::class, 'vente']);





Route::get('annonces/{id}', [\App\Http\Controllers\Api\AnnonceController::class, 'show']);


Route::get('reservation', [\App\Http\Controllers\Api\ReservationController::class, 'index']);
Route::post('reservation', [\App\Http\Controllers\Api\ReservationController::class, 'store']);
Route::put('reservation', [\App\Http\Controllers\Api\ReservationController::class, 'show']);
Route::delete('reservation', [\App\Http\Controllers\Api\ReservationController::class, 'destroy']);
Route::get('my-reservation/{client}', [\App\Http\Controllers\Api\ReservationController::class, 'getClientReservations']);

Route::get('mes-locataires/{proprietaire}', [\App\Http\Controllers\Api\UserController::class, 'getLocataires']);
