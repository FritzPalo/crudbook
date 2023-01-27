<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookcontroller;
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

Route::get('/', [bookcontroller::class, 'view' ])->name('book.view');
Route::post('/create', [bookController::class, 'create']);
Route::get('/edit/{id}', [bookController::class, 'edit']);
Route::get('/show/{id}', [bookController::class, 'show']);
Route::put('/update/{id}', [bookController::class, 'update']);
Route::delete('/delete/{id}', [bookController::class, 'delete']);
Route::get('/fetchbooks', [BookController::class, 'fetchbooks']);