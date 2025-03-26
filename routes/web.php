<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AddEditController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/index', [PageController::class, 'index'])->name('index');
Route::get('/member', [PageController::class, 'single'])->name('single');


Route::middleware('auth')->group(function () {
    Route::get('/add', [PageController::class, 'create'])->name('add');
    Route::post('/add', [PageController::class, 'store'])->name('add.submit');
    Route::get('/edit/{id}', [AddEditController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [AddEditController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [AddEditController::class, 'destroy'])->name('delete');
    Route::post('/member/{id}', [PageController::class, 'uploadImage'])->name('upload-image');
    Route::delete('/image/{id}', [PageController::class, 'deleteImage'])->name('image.delete');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
