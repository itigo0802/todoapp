<?php

use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->middleware('guest', 'precognitive')->name('register.store');

Route::middleware('auth')->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('home');

    Route::post('/create', [TodoController::class, 'store'])->name('todos.store');

    Route::post('/edit/{todo}', [TodoController::class, 'update'])->name('todos.update');

    Route::delete('/delete/{todo}', [TodoController::class, 'destroy'])->name('todos.delete');
});
