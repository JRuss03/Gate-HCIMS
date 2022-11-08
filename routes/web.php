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
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::post('/edit-store-users', [App\Http\Controllers\UserController::class, 'edit_store'])->name('users.edit-store');
Route::get('/users/add', [App\Http\Controllers\UserController::class, 'add'])->name('users.add');
Route::post('/users/register', [App\Http\Controllers\UserController::class, 'register'])->name('users.register');
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'delete'] );
Route::get('/users/manage-account', [App\Http\Controllers\UserController::class, 'manage'])->name('users.manage');

// Resident
Route::get('/residents', [App\Http\Controllers\ResidentController::class, 'index'])->name('residents.index');
Route::get('/residents/add', [App\Http\Controllers\ResidentController::class, 'add'])->name('residents.add');

    // Pregnant
    Route::get('/residents/pregnant/{id}', [App\Http\Controllers\ResidentController::class, 'pregnant_show'])->name('resident.pregnant.show');
    Route::get('/residents/pregnant/edit', [App\Http\Controllers\ResidentController::class, 'pregnant_edit'])->name('resident.pregnant.edit');
    Route::post('/pregnant/register', [App\Http\Controllers\PregnantController::class, 'register'])->name('pregnant.register');
    

    // Senior
    Route::get('/residents/senior/show/{id}', [App\Http\Controllers\ResidentController::class, 'senior_show'])->name('resident.senior.show');
    Route::post('/senior/register', [App\Http\Controllers\SeniorController::class, 'register'])->name('senior.register');
    Route::get('/senior/edit/{id}', [App\Http\Controllers\SeniorController::class, 'edit'])->name('senior.edit');
    Route::post('/edit-store-seniors', [App\Http\Controllers\SeniorController::class, 'edit_store'])->name('seniors.edit-store');
    Route::get('/senior/delete/{id}', [App\Http\Controllers\SeniorController::class, 'delete'] )->name('senior.delete');

    
    // Baby
    Route::get('/residents/baby/show/{id}', [App\Http\Controllers\ResidentController::class, 'baby_show'])->name('resident.baby.show');
    Route::post('/baby/register', [App\Http\Controllers\BabyController::class, 'register'])->name('baby.register');
    Route::get('/baby/edit/{id}', [App\Http\Controllers\BabyController::class, 'edit'])->name('baby.edit');
    Route::post('/edit-store-baby', [App\Http\Controllers\BabyController::class, 'edit_store'])->name('baby.edit-store');
    Route::get('/baby/delete/{id}', [App\Http\Controllers\BabyController::class, 'delete'] )->name('baby.delete');
// End of Resident

// Check-up Forms
Route::get('/checkup-forms', [App\Http\Controllers\FormController::class, 'index'])->name('checkup-forms.index');

    // Prenatal 
    Route::get('/checkup-forms/prenatal/list', [App\Http\Controllers\FormController::class, 'prenatal_list'])->name('checkup-forms.prenatal.list');
    Route::get('/checkup-forms/prenatal/add/{id}', [App\Http\Controllers\FormController::class, 'prenatal_add'])->name('checkup-forms.prenatal.add');
    Route::get('/checkup-forms/prenatal/index', [App\Http\Controllers\FormController::class, 'prenatal_index'])->name('checkup-forms.prenatal.index');
    Route::get('/checkup-forms/prenatal/show', [App\Http\Controllers\FormController::class, 'prenatal_show'])->name('checkup-forms.prenatal.show');
    Route::get('/checkup-forms/prenatal/edit', [App\Http\Controllers\FormController::class, 'prenatal_edit'])->name('checkup-forms.prenatal.edit');

// End of Check-up Forms

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
