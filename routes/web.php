<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});


Route::controller(CountryController::class)->group(function () {
    Route::get('index',  'index');
    Route::post('countryCreate', 'countryCreate');
    Route::get('countryEdit/{id}', 'countryEdit');
    Route::put('countryUpdate/{id}', 'countryUpdate');
    Route::delete('countryDelete/{id}', 'countryDelete');
});

Route::controller(StateController::class)->group(function () {
    Route::get('Showstate',  'Showstate');
    Route::post('Statecreate', 'Statecreate');
    Route::get('Stateedit/{id}', 'Stateedit');
    Route::put('Stateupdate/{id}', 'Stateupdate');
    Route::delete('Statedelete/{id}', 'Statedelete');
});

Route::controller(CityController::class)->group(function () {
    Route::get('Showcity',  'Showcity');
    Route::post('create', 'create');
    Route::get('edit/{id}', 'edit');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
});
