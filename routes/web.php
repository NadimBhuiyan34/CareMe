<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TreatmentController;
use Illuminate\Http\Request;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('active:active') ;
// Route::get('/patient', [HomeController::class, 'patient'])->name('patient')->middleware('active:active') ;
// Route::get('/doctor', [HomeController::class, 'doctor'])->name('doctor')->middleware('active:active') ;
 


Route::get('/sensor', [SensorController::class, 'showData'])->name('sensor.data');
// users-list
Route::get('/users-pending', [UserController::class, 'pending'])->name('users.pending')->middleware('role:1,2');
Route::get('/user-block', [UserController::class, 'block'])->name('users.block')->middleware('role:1,2');
// doctors-list
Route::get('/doctors-pending', [DoctorController::class, 'pending'])->name('doctors.pending')->middleware('role:1,2');
Route::get('/doctors-block', [DoctorController::class, 'block'])->name('doctors.block')->middleware('role:1,2');

// Users
Route::resource('users', UserController::class)->except(['update'])->middleware('role:1,2');
Route::patch('/users/{user}/update', [UserController::class, 'update'])->name('users.update')->middleware('admin:1');
// Doctors Controller
Route::resource('doctors', DoctorController::class)->middleware('role:1,2');
// Profile Controller
Route::resource('profiles', ProfileController::class);
Route::post('/doctors-profile', [ProfileController::class, 'doctor_profile'])->name('doctors.profile');
// Take Treatment
Route::resource('treatments', TreatmentController::class);
// Route::get('/take-treatement', [TreatmentController::class, 'index'])->name('treatment');   


 