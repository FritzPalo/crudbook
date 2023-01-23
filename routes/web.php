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
Route::get('/create', [bookcontroller::class, 'createview' ])->name('create.view');
Route::post('/book-create', [bookController::class, 'create'])->name('create');
Route::get('/update/{id}', [bookcontroller::class, 'updateview' ])->name('update.view');
Route::post('/book-update/{id}', [bookController::class, 'update'])->name('update');
Route::a('/book-delete/{id}', [bookController::class, 'delete'])->name('delete');