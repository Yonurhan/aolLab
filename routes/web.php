<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OutletController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/homepage');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/homepage', [MenuController::class, 'index'])->name('makanan');

Route::get('/menu-items', function () {
    return view('menuitems');
});
Route::get('/menu-items', [MenuController::class, 'menu'])->name('menuitembos');
Route::get('/menu-items', [MenuController::class, 'search']);
Route::post('/menu-items', [MenuController::class, 'search']);

Route::get('/outlets', function () {
    return view('outlets');
});
Route::get('/outlets', [OutletController::class, 'index']);
Route::get('/outlets', [OutletController::class, 'search']);
Route::post('/outlets', [OutletController::class, 'search']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
});
