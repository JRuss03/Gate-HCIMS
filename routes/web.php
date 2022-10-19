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
    Route::get('/residents/pregnant/edit', [App\Http\Controllers\ResidentController::class, 'pregnant_edit'])->name('resident.pregnant.edit');

    // Senior
    Route::get('/residents/senior', [App\Http\Controllers\ResidentController::class, 'senior_show'])->name('resident.senior.show');
    Route::get('/residents/senior/edit', [App\Http\Controllers\ResidentController::class, 'senior_edit'])->name('resident.senior.edit');

    // Baby
    Route::get('/residents/baby', [App\Http\Controllers\ResidentController::class, 'baby_show'])->name('resident.baby.show');
    Route::get('/residents/baby/edit', [App\Http\Controllers\ResidentController::class, 'baby_edit'])->name('resident.baby.edit');

// End of Resident

// Check-up Forms
Route::get('/checkup-forms', [App\Http\Controllers\FormController::class, 'index'])->name('checkup-forms.index');

    // Prenatal 
    Route::get('/checkup-forms/prenatal/list', [App\Http\Controllers\FormController::class, 'prenatal_list'])->name('checkup-forms.prenatal.list');
    Route::get('/checkup-forms/prenatal/add', [App\Http\Controllers\FormController::class, 'prenatal_add'])->name('checkup-forms.prenatal.add');
    Route::get('/checkup-forms/prenatal/index', [App\Http\Controllers\FormController::class, 'prenatal_index'])->name('checkup-forms.prenatal.index');
    Route::get('/checkup-forms/prenatal/show', [App\Http\Controllers\FormController::class, 'prenatal_show'])->name('checkup-forms.prenatal.show');
    Route::get('/checkup-forms/prenatal/edit', [App\Http\Controllers\FormController::class, 'prenatal_edit'])->name('checkup-forms.prenatal.edit');

// End of Check-up Forms

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
