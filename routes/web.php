<?php

use App\Http\Controllers\ContratController;
use App\Http\Controllers\DetailReglementController;
use App\Http\Controllers\LocaliteController;
use App\Http\Controllers\ParcelleController;
use App\Http\Controllers\ReglementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TypeBienController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProprioController;
use App\Http\Controllers\AppartementController;
use App\Http\Controllers\BienImmobilierController;
use App\Http\Controllers\AnnonceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth.admin'])->group(function(){

    // ADMIN CONTROLLER
    Route::resource('bienImmobilier',BienImmobilierController::class);
    Route::resource('appartement', AppartementController::class);
    Route::resource('parcelle', ParcelleController::class);
    Route::resource('user',UserController::class);

    Route::get('user/{user}/bloquer', [UserController::class, 'bloquer'])->name('user.bloquer');
    Route::get('user/{user}/debloquer', [UserController::class, 'debloquer'])->name('user.debloquer');
//Agent
  Route::get('admin-add-agent/',[UserController::class,'addAgent'])
    ->name('add.agent');

  Route::get('admin-edit-agent/{agent}',[UserController::class,'editAgent'])
    ->name('edit.agent');


  //Proprietaire
  Route::get('admin-add-proprietaire/',[UserController::class,'addProprietaire'])
    ->name('add.proprietaire');

  Route::get('admin-edit-proprietaire/{proprietaire}',[UserController::class,'editProprietaire'])
    ->name('edit.proprietaire');



  //Client
   Route::get('admin-add-client/',[UserController::class,'addClient'])
     ->name('add.client');

  Route::get('admin-edit-client/{client}',[UserController::class,'editClient'])
    ->name('edit.client');



    Route::get('homeAdmin',[AdminController::class,'home'])->name('home.admin');
    Route::get('admin-liste-users/',[AdminController::class,'index'])->name('listes.admin.users');
    Route::post('admin-add-users/',[AdminController::class,'store'])->name('add.admin.users');

    // Route for immeuble
    Route::get('admin-add-immeuble/',[BienImmobilierController::class,'addImmeuble'])
      ->name('add.immeuble');
    Route::post('admin-store-immeuble/',[BienImmobilierController::class,'storeImmeuble'])
      ->name('store.immeuble');
    Route::get('admin-edit-immeuble/{immeuble}',[BienImmobilierController::class,'editImmeuble'])
      ->name('edit.immeuble');
    Route::post('admin-update-immeuble/{immeuble}',[BienImmobilierController::class,'updateImmeuble'])
      ->name('update.immeuble');


  // Route for maison
  Route::get('admin-add-maison/',[BienImmobilierController::class,'addMaison'])
    ->name('add.maison');
  Route::post('admin-store-maison/',[BienImmobilierController::class,'storeMaison'])
    ->name('store.maison');
  Route::get('admin-edit-maison/{maison}',[BienImmobilierController::class,'editMaison'])
    ->name('edit.maison');
  Route::post('admin-update-maison/{maison}',[BienImmobilierController::class,'updateMaison'])
    ->name('update.maison');

  // Route for terrain
  Route::get('admin-add-terrain/',[BienImmobilierController::class,'addTerrain'])
    ->name('add.terrain');
  Route::post('admin-store-terrain/',[BienImmobilierController::class,'storeTerrain'])
    ->name('store.terrain');
  Route::get('admin-edit-terrain/{terrain}',[BienImmobilierController::class,'editTerrain'])
    ->name('edit.terrain');
  Route::post('admin-update-terrain/{terrain}',[BienImmobilierController::class,'updateTerrain'])
    ->name('update.terrain');


  //Route for reservation
  Route::get('admin-valide-reservation/{reservation}/valider',[ReservationController::class,'valider'])
    ->name('reservation.valider');
  Route::get('admin-refuse-reservation/{reservation}/refuser',[ReservationController::class,'refuser'])
    ->name('reservation.refuser');


});



Route::get('',[AdminController::class,'login'])->name('admin.login');
Route::get('/register',[AdminController::class,'register'])->name('admin.register');
Route::post('Authentification-admin/',[AdminController::class,'doLogin'])->name('doLogin.login');
Route::post('Authentification-admin/register',[AdminController::class,'doRegister'])->name('doRegister.register');

//annonce
Route::resource('annonce', AnnonceController::class);

//contrat
Route::resource('contrat', ContratController::class);

//DetailReglement
Route::resource('detailReglement', DetailReglementController::class);

//localite
Route::resource('localite', LocaliteController::class);

//reglement
Route::resource('reglement', ReglementController::class);

//reservation
Route::resource('reservation', ReservationController::class);

//typebien
Route::resource('typebien', TypeBienController::class);

//contrat-pdf
Route::get('contrats/pdf', [ContratController::class, 'generatePDF'])->name('contrat.pdf');

//contrat-pdf
Route::get('reglements/pdf', [ReglementController::class, 'generatePDF'])->name('reglement.pdf');

Route::get('reglements/{contrat}/create', [ReglementController::class, 'reglement'])->name('reglement');
