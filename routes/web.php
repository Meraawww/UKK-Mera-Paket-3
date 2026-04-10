<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AspirasisController;
use App\Http\Controllers\SiswasController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    })->name('index');
    Route::get('login', [AdminsController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminsController::class, 'login']);
    Route::post('logout', [AdminsController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminsController::class, 'dashboard'])->name('dashboard');

        // Admin routes
        Route::get('admins', [AdminsController::class, 'index'])->name('admins.index');
        Route::get('create', [AdminsController::class, 'create'])->name('create');
        Route::post('/', [AdminsController::class, 'store'])->name('store');
        Route::get('{admin}/edit', [AdminsController::class, 'edit'])->name('edit');
        Route::put('{admin}', [AdminsController::class, 'update'])->name('update');
        Route::delete('{admin}', [AdminsController::class, 'destroy'])->name('destroy');

        // Aspirasi CRUD routes
        Route::resource('aspirasi', AspirasisController::class);
    });
});

// Siswa routes
Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    })->name('index');
    Route::match(['get', 'post'], 'login', [SiswasController::class, 'login'])->name('login');

    Route::post('logout', function (Illuminate\Http\Request $request) {
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logout berhasil!');
    })->name('logout');

    Route::middleware('auth:siswa')->group(function () {
        Route::get('dashboard', [SiswasController::class, 'dashboard'])->name('dashboard');
        Route::post('aspirasi', [SiswasController::class, 'storeAspirasi'])->name('aspirasi.store');
        Route::get('histori/{nis}', [SiswasController::class, 'show'])->name('histori');
        Route::get('status-penyelesaian', [SiswasController::class, 'statusPenyelesaian'])->name('status');
    });
});
