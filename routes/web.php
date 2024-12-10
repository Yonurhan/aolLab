<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProfileController;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/homepage');
});

Route::get('/login', function () {
    return redirect('/homepage');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/homepage', [MenuController::class, 'index'])->name('makanan');

Route::get('/menu-items', [MenuController::class, 'menu'])->name('menuitembos');
Route::get('/menu-items', [MenuController::class, 'search']);
Route::post('/menu-items', [MenuController::class, 'search']);

Route::get('/outlets', [OutletController::class, 'index']);
Route::get('/outlets', [OutletController::class, 'search']);
Route::post('/outlets', [OutletController::class, 'search']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/add-outlet', [OutletController::class, 'index_add']);
    Route::post('/add-outlet', [OutletController::class, 'add']);
    Route::put('/add-outlet', [OutletController::class, 'edit']);
    Route::get('/add-outlet/{id}/edit', [OutletController::class, 'edit'])->name('outlet.edit');
    Route::put('/add-outlet/{id}', [OutletController::class, 'update'])->name('outlets.update');

    Route::get('/add-menu', [MenuController::class, 'index_add']);
    Route::post('/add-menu', [MenuController::class, 'add']);
    Route::get('/add-menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/add-menu/{id}', [MenuController::class, 'update'])->name('menus.update');
});
