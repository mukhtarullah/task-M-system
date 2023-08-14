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

Route::get('/', [TaskController::class, 'index'])->name('task.list');
Route::get('create',[TaskController::class, 'create'])->name('task.create');
Route::post('store',[TaskController::class, 'store'])->name('task.store');
Route::post('delete/{id}',[TaskController::class, 'delete'])->name('task.delete');
Route::get('edit/{id}',[TaskController::class, 'edit'])->name('task.edit');
Route::post('update/{id}',[TaskController::class, 'update'])->name('task.update');
