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
    if(Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login');
    }
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Get year only
Route::get('/dashboard/pregnant/get-year/{year}', [App\Http\Controllers\DashboardController::class, 'getPregYear'])->middleware('auth');
Route::get('/dashboard/senior/get-year/{year}', [App\Http\Controllers\DashboardController::class, 'getSeniorYear'])->middleware('auth');
Route::get('/dashboard/baby/get-year/{year}', [App\Http\Controllers\DashboardController::class, 'getBabyYear'])->middleware('auth');
// Filter data
Route::get('/dashboard/pregnant/filter', [App\Http\Controllers\DashboardController::class, 'pregFilter'])->middleware('auth');
Route::get('/dashboard/senior/filter', [App\Http\Controllers\DashboardController::class, 'seniorFilter'])->middleware('auth');
Route::get('/dashboard/baby/filter', [App\Http\Controllers\DashboardController::class, 'babyFilter'])->middleware('auth');

// Users
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::post('/edit-store-users', [App\Http\Controllers\UserController::class, 'edit_store'])->name('users.edit-store')->middleware('auth');
Route::get('/users/add', [App\Http\Controllers\UserController::class, 'add'])->name('users.add')->middleware('auth');
Route::post('/users/register', [App\Http\Controllers\UserController::class, 'register'])->name('users.register')->middleware('auth');
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'delete'] )->middleware('auth');
Route::get('/users/manage-account', [App\Http\Controllers\UserController::class, 'manage'])->name('users.manage')->middleware('auth');

// Resident
Route::get('/residents', [App\Http\Controllers\ResidentController::class, 'index'])->name('residents.index')->middleware('auth');
Route::get('/residents/add', [App\Http\Controllers\ResidentController::class, 'add'])->name('residents.add')->middleware('auth');

    // Pregnant
    Route::get('/residents/pregnant/{id}', [App\Http\Controllers\ResidentController::class, 'pregnant_show'])->name('resident.pregnant.show')->middleware('auth');
    Route::get('/residents/pregnant/edit/{id}', [App\Http\Controllers\ResidentController::class, 'pregnant_edit'])->name('resident.pregnant.edit')->middleware('auth');
    Route::post('/residents/pregnant/update', [App\Http\Controllers\PregnantController::class, 'update'])->name('pregnant.update')->middleware('auth');
    Route::post('/residents/pregnant/register', [App\Http\Controllers\PregnantController::class, 'register'])->name('pregnant.register')->middleware('auth');
    Route::get('/residents/pregnant/delete/{id}', [App\Http\Controllers\PregnantController::class, 'delete'])->name('pregnant.delete')->middleware('auth');
    

    // Senior
    Route::get('/residents/senior/show/{id}', [App\Http\Controllers\SeniorController::class, 'show'])->name('senior.show')->middleware('auth');
    Route::post('/senior/register', [App\Http\Controllers\SeniorController::class, 'register'])->name('senior.register')->middleware('auth');
    Route::get('/residents/senior/edit/{id}', [App\Http\Controllers\SeniorController::class, 'edit'])->name('senior.edit')->middleware('auth');
    Route::post('/edit-store-seniors', [App\Http\Controllers\SeniorController::class, 'edit_store'])->name('seniors.edit-store')->middleware('auth');
    Route::get('/senior/delete/{id}', [App\Http\Controllers\SeniorController::class, 'delete'] )->name('senior.delete')->middleware('auth');

    
    // Baby
    Route::get('/residents/baby/show/{id}', [App\Http\Controllers\BabyController::class, 'show'])->name('baby.show')->middleware('auth');
    Route::post('/baby/register', [App\Http\Controllers\BabyController::class, 'register'])->name('baby.register')->middleware('auth');
    Route::get('/residents/baby/edit/{id}', [App\Http\Controllers\BabyController::class, 'edit'])->name('baby.edit')->middleware('auth');
    Route::post('/edit-store-baby', [App\Http\Controllers\BabyController::class, 'edit_store'])->name('baby.edit-store')->middleware('auth');
    Route::get('/baby/delete/{id}', [App\Http\Controllers\BabyController::class, 'delete'] )->name('baby.delete')->middleware('auth');
// End of Resident

// Check-up Forms
Route::get('/checkup-forms', [App\Http\Controllers\FormController::class, 'index'])->name('checkup-forms.index')->middleware('auth');

    // Prenatal 
    Route::get('/checkup-forms/prenatal/list', [App\Http\Controllers\FormController::class, 'prenatal_list'])->name('checkup-forms.prenatal.list')->middleware('auth');
    Route::get('/checkup-forms/prenatal/add/{id}', [App\Http\Controllers\FormController::class, 'prenatal_add'])->name('checkup-forms.prenatal.add')->middleware('auth');
    Route::get('/checkup-forms/prenatal/index', [App\Http\Controllers\FormController::class, 'prenatal_index'])->name('checkup-forms.prenatal.index')->middleware('auth');
    Route::get('/checkup-forms/prenatal/show/{id}', [App\Http\Controllers\FormController::class, 'prenatal_show'])->name('checkup-forms.prenatal.show')->middleware('auth');
    Route::get('/checkup-forms/prenatal/edit/{id}', [App\Http\Controllers\FormController::class, 'prenatal_edit'])->name('checkup-forms.prenatal.edit')->middleware('auth');
    Route::post('/checkup-forms/prenatal/register', [App\Http\Controllers\FormController::class, 'register'])->name('checkup-forms.prenatal.register')->middleware('auth');
    Route::post('/checkup-forms/prenatal/update', [App\Http\Controllers\FormController::class, 'update'])->name('checkup-forms.prenatal.update')->middleware('auth');
    Route::get('/checkup-forms/prenatal/delete/{id}', [App\Http\Controllers\FormController::class, 'delete'])->name('checkup-forms.prenatal.delete')->middleware('auth');

// End of Check-up Forms

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
