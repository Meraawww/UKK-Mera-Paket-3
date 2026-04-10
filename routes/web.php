<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    })->name('index');
    Route::get('login', [AdminsController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminsController::class, 'login']);
    Route::post('logout', [AdminsController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [AdminsController::class, 'dashboard'])->name('dashboard');
        Route::get('admins', [AdminsController::class, 'index'])->name('admins.index');
        Route::get('create', [AdminsController::class, 'create'])->name('create');
        Route::post('/', [AdminsController::class, 'store'])->name('store');
        Route::get('{admin}/edit', [AdminsController::class, 'edit'])->name('edit');
        Route::put('{admin}', [AdminsController::class, 'update'])->name('update');
        Route::delete('{admin}', [AdminsController::class, 'destroy'])->name('destroy');
    });
});
