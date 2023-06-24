<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MakananController;
use App\Http\Controllers\Admin\MinumanController;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware('auth')->group(function() {
    Route::prefix('/admin')->group(function() {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Route::resource('/makanan', MakananController::class);
        Route::get('/makanan', [MakananController::class, 'index'])->name('makanan.index');
        Route::get('/makanan/create', [MakananController::class, 'create'])->name('makanan.create');
        Route::post('/makanan/store', [MakananController::class, 'store'])->name('makanan.store');
        Route::get('makanan/edit/{id}', [MakananController::class, 'edit'])->name('makanan.edit');
        Route::post('makanan/update/{id}', [MakananController::class, 'update'])->name('makanan.update');
        Route::post('/makanan/destroy/{id}', [MakananController::class, 'destroy'])->name('makanan.destroy');

        Route::get('/minuman', [MinumanController::class, 'index'])->name('minuman.index');
        Route::get('/minuman/create', [MinumanController::class, 'create'])->name('minuman.create');
        Route::post('/minuman/store', [MinumanController::class, 'store'])->name('minuman.store');
        Route::get('/minuman/edit/{id}', [MinumanController::class, 'edit'])->name('minuman.edit');
        Route::post('/minuman/update/{id}', [MinumanController::class, 'update'])->name('minuman.update');
        Route::post('/minuman/destroy/{id}', [MinumanController::class, 'destroy'])->name('minuman.destroy');

    });
});

Route::get('/rizky', [ContohController::class, 'rizky_perdana']);

Route::get('/about', function() {
    return view('myfolder.rizky');
});
