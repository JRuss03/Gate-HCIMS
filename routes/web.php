<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Users
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::get('/users/add', [App\Http\Controllers\UserController::class, 'add'])->name('users.add');
Route::get('/users/manage-account', [App\Http\Controllers\UserController::class, 'manage'])->name('users.manage');

// Resident
Route::get('/residents', [App\Http\Controllers\ResidentController::class, 'index'])->name('residents.index');
Route::get('/residents/add', [App\Http\Controllers\ResidentController::class, 'add'])->name('residents.add');

    // Pregnant
    Route::get('/residents/pregnant', [App\Http\Controllers\ResidentController::class, 'pregnant_show'])->name('resident.pregnant.show');

// End of Resident

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
