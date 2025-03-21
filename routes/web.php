<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AddEditController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/index', [PageController::class, 'index'])->name('index');

    Route::get('/member', [PageController::class, 'single'])->name('single');
});


Route::middleware('auth')->group(function () {
    Route::get('/add', [PageController::class, 'create'])->name('add');
    Route::post('/add', [PageController::class, 'store'])->name('add.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/edit/{id}', [AddEditController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [AddEditController::class, 'update'])->name('edit.submit');
    Route::delete('/delete/{id}', [AddEditController::class, 'destroy'])->name('delete');
});
