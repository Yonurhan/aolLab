<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController; 

Route::get('/', function () {
    return view('homepage');
});

Route::get('/', [MenuController::class, 'index'])->name('makanan');

Route::get('/menu-items', function () {
    return view('menuitems');
});
Route::get('/menu-items', [MenuController::class, 'menu'])->name('makanan');

Route::get('/menu-items', [MenuController::class, 'search']);
Route::post('/menu-items', [MenuController::class, 'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
