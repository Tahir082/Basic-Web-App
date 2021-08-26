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

/*
Route::get('/', function () {
   return view('welcome');
});
*/

Route::get('/', [App\Http\Controllers\visJson::class, 'visualize'])->name('visualize');
Route::get('/jsonToSql', [App\Http\Controllers\SqlModelController::class, 'jsonToSql'])->name('jsonToSql');
Route::get('/sqlModel', [App\Http\Controllers\SqlModelController::class, 'read'])->name('sqlModel');


Route::post('/sqlModel/create', [App\Http\Controllers\SqlModelController::class, 'create'])->name('create');
Route::post('/sqlModel', [App\Http\Controllers\SqlModelController::class, 'search'])->name('search');
Route::post('/sqlModel/update/{id}', [App\Http\Controllers\SqlModelController::class, 'update'])->name('update');
Route::get('/sqlModel/delete/{id}', [App\Http\Controllers\SqlModelController::class, 'delete'])->name('delete');
