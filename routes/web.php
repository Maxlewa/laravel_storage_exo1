<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/admin', [ImageController::class, 'admin'])->name('adminHome');

// Create - Store

Route::get('admin/create/image', [ImageController::class, 'create'])->name('admin.image.create');
Route::post('admin/store/image', [ImageController::class, 'store'])->name('admin.image.store');

// Delete

Route::delete('/admin/delete/{id}/image', [ImageController::class, 'destroy'])->name('admin.image.destroy');

// Edit - Update

Route::get('/admin/edit/{id}/image', [ImageController::class, 'edit'])->name('admin.image.edit');
Route::put('/admin/update/{id}/image', [ImageController::class, 'update'])->name('admin.image.update');
