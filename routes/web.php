<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideogameController;
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

Route::get('/', [GuestHomeController::class, 'index'])->name('guest.home');

Route::prefix('/admin')->name('admin.')->middleware(['auth'])->group(function () {

    // home
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');

    // trash
    Route::get('/videogames/trash', [VideogameController::class, 'trash'])->name('videogames.trash');
    Route::delete('/videogames/trash/{team}/drop', [VideogameController::class, 'drop'])->name('videogames.drop');
    Route::delete('/videogames/trash/drop', [VideogameController::class, 'dropAll'])->name('videogames.dropAll');
    Route::patch('/videogames/{team}/restore', [VideogameController::class, 'restore'])->name('videogames.restore');

    Route::resource('/videogames', VideogameController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
