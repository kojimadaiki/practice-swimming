<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PracticeController;

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

Route::get('/', [PracticeController::class, 'top'])->name('practice');

Route::get('/practice/create', [PracticeController::class, 'create'])->name('create');

Route::post('/practice/store', [PracticeController::class, 'store'])->name('store');

Route::get('/practice/{id}', [PracticeController::class, 'show'])->name('show');

Route::get('/practice/edit/{id}', [PracticeController::class, 'edit'])->name('edit');

Route::post('/practice/update', [PracticeController::class, 'update'])->name('update');

Route::post('/practice/delete/{id}', [PracticeController::class, 'delete'])->name('delete');