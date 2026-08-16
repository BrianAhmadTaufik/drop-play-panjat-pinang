<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'event');

Route::get('/admin', [
    AdminController::class,
    'index',
])->name('admin');

Route::post('/admin/topup', [
    AdminController::class,
    'topup',
])->name('admin.topup');

Route::delete('/admin/transaction/{transaction}', [
    AdminController::class,
    'destroy',
])->name('admin.transaction.destroy');