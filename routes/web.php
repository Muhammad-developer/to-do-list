<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'index'])->name("index");
Route::get('/create', [TaskController::class, 'create'])->name('create');
Route::post('/store', [TaskController::class, 'store'])->name('store');
Route::post('/update', [TaskController::class, 'update'])->name('update');
Route::get('/delete', [TaskController::class, 'destroy'])->name('delete');
Route::get('/show', [TaskController::class, 'show'])->name('show');
Route::get('/history/{id}', [TaskController::class, 'showHistory'])->name('history');

Route::resources([
    '/tasks' => TaskController::class
]);
