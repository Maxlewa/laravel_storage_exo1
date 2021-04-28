<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/admin', [ImageController::class, 'admin'])->name('adminHome');

Route::get('admin/create/image', [ImageController::class, 'create'])->name('admin.image.create');
Route::post('admin/store/image', [ImageController::class, 'store'])->name('admin.image.store');

Route::delete('/admin/delete/{id}/image', [ImageController::class, 'destroy'])->name('admin.image.destroy');
