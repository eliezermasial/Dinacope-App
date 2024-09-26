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



Route::prefix('dinacope')->name('dinacope.')->group(function () {
    //Route::get('/index', [\App\Http\Controllers\ElevesServiceController::class, 'index']);
    Route::resource('/eleve', \App\Http\Controllers\ElevesServiceController::class);
});

