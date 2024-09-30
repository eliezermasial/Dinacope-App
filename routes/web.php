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
    Route::resource('/ecole/{ecole}/eleve', \App\Http\Controllers\ElevesServiceController::class)->names([
        'index' => 'ecole.eleve.index',
        'create' => 'ecole.eleve.create',
        'store' => 'ecole.eleve.store',
        'show' => 'ecole.eleve.show',
        'edit' => 'ecole.eleve.edit',
        'update' => 'ecole.eleve.update',
        'destroy' => 'ecole.eleve.destroy'
    ]);

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

