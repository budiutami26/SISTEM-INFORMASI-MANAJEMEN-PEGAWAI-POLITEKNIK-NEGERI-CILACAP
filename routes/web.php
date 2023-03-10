<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('login1');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/login1', function () {
    return view('layouts.pages-login');
})->name('login1');


Route::resource('pegawai', PegawaiController::class)->middleware('auth');

Route::resource('pengguna', PenggunaController::class)->middleware('role:admin');

Route::get('dashboard1', [LoginController::class, 'dashboard'])->middleware('auth')->name('dashboard1');


Route::post('login2', [LoginController::class, 'login'])->name('login.auth');

Route::get('profile', [UserController::class, 'tampil'])->name('profile')->middleware('auth');
Route::post('profile', [UserController::class, 'update'])->name('profile.up')->middleware('auth');
Route::post('logout1',[LoginController::class,'logout'])->name('logout1');
