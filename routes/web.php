<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('sucursals', 'livewire.sucursals.index')->middleware('auth');
	Route::view('vuelos', 'livewire.vuelos.index')->middleware('auth');
	Route::view('clientes', 'livewire.clientes.index')->middleware('auth');
	Route::view('hotels', 'livewire.hotels.index')->middleware('auth');