<?php

use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')
    ->prefix('dashboard')
    ->group(function () {

        Route::prefix('coordinator')
            ->name('coordinator.')
            ->group(function () {
                Route::get('', [CoordinatorController::class, 'index'])->name('dashboard');
                Route::get('/status/{society}', [CoordinatorController::class, 'toggleSocietyStatus'])->name('toggle-society-status');
                Route::get('/edit/{society}', [CoordinatorController::class, 'editSocietyForm'])->name('edit-society-form');
                Route::patch('/edit/{society}', [CoordinatorController::class, 'editSociety'])->name('edit-society');
                Route::get('/create', [CoordinatorController::class, 'createSocietyForm'])->name('create-society-form');
                Route::post('/create', [CoordinatorController::class, 'createSociety'])->name('create-society');
            });

        Route::name('user.')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/enrolled', 'enrolled')->name('enrolled-societies');
                Route::get('not-enrolled', 'enrolled')->name('not-enrolled-societies');
                Route::get('/join/{society}', 'joinSociety')->name('join-society');
                Route::get('/leave/{society}', 'leaveSociety')->name('leave-society');
            });

    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
