<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContohController;
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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/dashboard', function() {
    return view('dashboard.dashboard');
})->name('dashboard');




Route::get('/contoh', [ContohController::class, 'rizky']);

Route::get('/about', function() {
    return view('myfolder.rizky');
});
