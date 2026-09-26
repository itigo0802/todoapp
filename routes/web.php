<?php

use App\Http\Controllers\PasskeyController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UpdateUserInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->middleware('guest', 'precognitive')->name('register.store');

Route::middleware('auth')->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('home');

    Route::post('/create', [TodoController::class, 'store'])->name('todos.store');

    Route::post('/edit/{todo}', [TodoController::class, 'update'])->name('todos.update');

    Route::delete('/delete/{todo}', [TodoController::class, 'destroy'])->name('todos.delete');

    Route::get('/update-user-info', [UpdateUserInfoController::class, 'edit'])->name('updateUserInfo.edit');
    Route::patch('/update-user-info', [UpdateUserInfoController::class, 'update'])->middleware('precognitive')->name('updateUserInfo.update');

    Route::get('/update-password', [UpdatePasswordController::class, 'edit'])->name('updatePassword.edit');
    Route::patch('/update-password', [UpdatePasswordController::class, 'update'])->middleware('precognitive')->name('updatePassword.update');

    Route::get('/passkey', [PasskeyController::class, 'index'])->middleware('password.confirm')->name('passkey.index');
});
