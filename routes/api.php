<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/books',  [App\Http\Controllers\BookController::class,'index'])->name('books');
Route::post('/books',  [App\Http\Controllers\BookController::class,'store'])->name('books.store');
Route::get('/books/{book}',  [App\Http\Controllers\BookController::class,'show'])->name('books.show');
Route::put('/books/{book}',  [App\Http\Controllers\BookController::class,'update'])->name('books.update');
Route::delete('/books/{book}',  [App\Http\Controllers\BookController::class,'destroy'])->name('books.destroy');

Route::get('/chapters',  [App\Http\Controllers\BookController::class,'index'])->name('chapters');
Route::post('/chapters',  [App\Http\Controllers\BookController::class,'store'])->name('chapters.store');
Route::get('/chapters/{chapter}',  [App\Http\Controllers\BookController::class,'show'])->name('chapters.show');
Route::put('/chapters/{chapter}',  [App\Http\Controllers\BookController::class,'update'])->name('chapters.update');
Route::delete('/chapters/{chapter}',  [App\Http\Controllers\BookController::class,'destroy'])->name('chapters.destroy');
