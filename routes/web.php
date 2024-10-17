<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TugasController;


Route::get('/Home', [HomeController::class,'index'])->name('Home');

//route resource
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('post.store');
Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/edit{id}', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/edit/{id}', [PostController::class, 'update'])->name('post.update');

Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
Route::get('/tugas/create', [TugasController::class, 'create'])->name('tgs.create');
Route::post('/tugas/create', [TugasController::class, 'store'])->name('tgs.store');
Route::delete('/tugas/delete/{id}', [TugasController::class, 'destroy'])->name('tgs.delete');
Route::get('/tugas/show/{id}', [TugasController::class, 'show'])->name('tgs.show');
Route::get('/tugas/edit{id}', [TugasController::class, 'edit'])->name('tgs.edit');
Route::patch('/tugas/edit/{id}', [TugasController::class, 'update'])->name('tgs.update');


