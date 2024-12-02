<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UsersController;

Route::middleware(['IsGuest'])->group(function () {
    Route::get('/', [UsersController::class, 'login'])->name('login');
    Route::post('/login/auth', [UsersController::class, 'loginAuth'])->name('login.auth');
});

Route::get('/error-permission', function() {
    return view('errors.permission');
})->name('errors.permission');

// Authenticated routes
Route::middleware(['IsLogin'])->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
    Route::get('/Home', [HomeController::class, 'index'])->name('Home');
});
// Route::get('/Home', [HomeController::class,'index'])->name('Home');

//route resource
Route::middleware([  'IsGuru'])->group(function () {
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/orders/export/excel', [PostController::class, 'exportExcel'])->name('orders.export.excel');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('post.store');
Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/edit{id}', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/edit/{id}', [PostController::class, 'update'])->name('post.update');

// // // User routes
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/users/add', [UsersController::class, 'create'])->name('users.add');
Route::post('/users/add', [UsersController::class, 'store'])->name('users.add.store');
Route::delete('/users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::patch('/users/edit/{id}', [UsersController::class, 'update'])->name('users.edit.update');
});

Route::middleware(['IsLogin', 'IsMurid'])->group(function() {
Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
Route::get('/tugas/create', [TugasController::class, 'create'])->name('tgs.create');
Route::post('/tugas/create', [TugasController::class, 'store'])->name('tgs.store');
Route::delete('/tugas/delete/{id}', [TugasController::class, 'destroy'])->name('tgs.delete');
Route::get('/tugas/show/{id}', [TugasController::class, 'show'])->name('tgs.show');
Route::get('/tugas/edit{id}', [TugasController::class, 'edit'])->name('tgs.edit');
Route::patch('/tugas/edit/{id}', [TugasController::class, 'update'])->name('tgs.update');
});


