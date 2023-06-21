<?php

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

Route::get('/desks/create', [DeskController::class, 'create']);
Route::post('/desks', [DesKController::class, 'store']);
Route::get('/desks/{id}/edit', [DeskController::class, 'edit']);
Route::put('/desks/{desk}', [DeskController::class, 'update']);
Route::patch('/desks/{desk}', [DeskController::class, 'patch'])->name('desks.patch');
Route::delete('/desks/{id}', [DeskController::class, 'destroy'])->name('desks.destroy');
