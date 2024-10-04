<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/dinacope')->name('dinacope.')->group(function () {
    //Routes resources pour gerer les evenement lié à l'ecole
    Route::resource('/ecole', \App\Http\Controllers\EcoleServiceController::class);

    //Routes resources pour gerer les evenement lié à aux eleves en partant de chaque ecole
    Route::resource('ecole/{ecole}/eleve', \App\Http\Controllers\ElevesServiceController::class)->names([
        'index' => 'ecole.eleve.index',
        'create' => 'ecole.eleve.create',
        
       
    'store' => 'ecole.eleve.store',
        'show' => 'ecole.eleve.show',
        
       
    'edit' => 'ecole.eleve.edit',
        'update' => 'ecole.eleve.update',
        'destroy' => 'ecole.eleve.destroy'

    ]);


    //Route resource pour gerer les fonctionnalités sur chef de battement
    Route::resource('ecole/chef', \App\Http\Controllers\ChefBattementServiceController::class)->names([
        'index' => 'ecole.chef.index',
        'store' => 'ecole.chef.store',
        'show' => 'ecole.chef.show',
        'edit' => 'ecole.chef.edit',
        'update' => 'ecole.chef.update',
        'destroy' => 'ecole.chef.destroy',

    ])->except('create');

    /*Route resources pour gerer le chef d'etablissement de chaque ecole
    Route::resource('/ecole/{ecole}/eleve', \App\Http\Controllers\ChefServiceController::class)->names([
        'index' => 'ecole.chef.index',
        'create' => 'ecole.chef.create',
        'store' => 'ecole.chef.story',
        'show' => 'ecole.chef.show',
        'edit' => 'ecole.chef.edit',
        'update' => 'ecole.chef.update',
        'destroy' => 'ecole.chef.destroy'
    ]);*/
});

Route::get('/login', [\App\Http\Controllers\LoginUserController::class, 'login'])->name('Auth.login');
Route::post('/login', [\App\Http\Controllers\LoginUserController::class, 'dologin'])->name('aut.login.dologin');
Route::get('/login/create', [\App\Http\Controllers\LoginUserController::class, 'createCompte'])->name('Auth.login.createCompte');
Route::post('/login/store', [\App\Http\Controllers\LoginUserController::class, 'store'])->name('Auth.login.store');
Route::Delete('/login', [\App\Http\Controllers\LoginUserController::class, 'logout'])->name('Auth.login');

Route::prefix('/dinacope')->name('dinacope.')->group(function() {
    Route::resource('agent', \App\Http\Controllers\AgentServiceController::class)->names('agent');
});

