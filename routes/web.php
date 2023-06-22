<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeskController;
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

Route::get('/', [DeskController::class, 'index']);
Route::get('/desks', [DeskController::class, 'index'])->middleware('isLoggedIn');
Route::get('/desks/create', [DeskController::class, 'create'])->middleware('isLoggedIn');
Route::post('/desks', [DesKController::class, 'store'])->middleware('isLoggedIn');
Route::get('/desks/{id}/edit', [DeskController::class, 'edit'])->middleware('isLoggedIn')->name('desks.edit');
Route::put('/desks/{desk}', [DeskController::class, 'update'])->middleware('isLoggedIn')->name('desks.update');
Route::patch('/desks/{desk}', [DeskController::class, 'patch'])->middleware('isLoggedIn')->name('desks.patch');
Route::delete('/desks/{id}', [DeskController::class, 'destroy'])->middleware('isLoggedIn')->name('desks.destroy');


//User Routes
Route::get('login', [AuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('login', [AuthController::class, 'loginUser'])->name('login-user');
Route::get('logout', [AuthController::class, 'logout'])->middleware('isLoggedIn');
Route::get('register', [AuthController::class, 'register'])->middleware('alreadyLoggedIn');
Route::post('register', [AuthController::class, 'registerUser'])->name('register-user');
Route::get('profile', [AuthController::class, 'profile'])->middleware('isLoggedIn');


//Category Routes
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/create', [CategoryController::class, 'create']);
Route::post('categories', [CategoryController::class, 'store']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
