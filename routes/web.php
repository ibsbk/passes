<?php

use  App\Http\Controllers\UserController;
use  App\Http\Controllers\PassController;
use  App\Http\Controllers\StaffController;
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

Route::get('/', [UserController::class,'mainView'])->name('/');

Route::get('/{id}', [PassController::class,'showAllPass'])->name('/{id}');

Route::get('/passes/addPass', [PassController::class,'addPassView'])->name('addPass');

Route::get('/passes/constantPass', [PassController::class,'constantPassView'])->name('constantPass');
Route::post('/passes/constantPass', [PassController::class,'constantPassPost']);

Route::get('/passes/temporaryPass', [PassController::class,'temporaryPassView'])->name('temporaryPass');
Route::post('/passes/temporaryPass', [PassController::class,'temporaryPassPost']);

Route::get('/staff/authStaff', [StaffController::class,'authStaffView'])->name('authStaff');
Route::post('/staff/authStaff', [StaffController::class,'authStaffPost']);

Route::get('/staff/adminLk', [StaffController::class,'adminLkView'])->name('adminLk');
Route::get('/staff/operatorLk', [StaffController::class,'operatorLkView'])->name('operatorLk');

Route::get('/staff/logout', [StaffController::class,'logout'])->name('logout');

Route::get('/editPass/{id}', [StaffController::class,'editPassView'])->name('editPass/{id}');
Route::post('/editPass/{id}', [StaffController::class,'editPassPost']);

Route::get('/staff/createUsers', [StaffController::class,'createUsers'])->name('createUsers');


Route::get('/staff/changeStatus/{id}', [StaffController::class,'changeStatusView'])->name('changeStatus/{id}');
Route::post('/staff/changeStatus/{id}', [StaffController::class,'changeStatusPost']);
