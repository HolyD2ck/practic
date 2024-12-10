<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/books', [\App\Http\Controllers\BooksController::class, 'index'])->name('books.index');
Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');
Route::get('/libraries', [\App\Http\Controllers\LibrariesController::class, 'index'])->name('libraries.index');
Route::get('/publishers', [\App\Http\Controllers\PublishersController::class, 'index'])->name('publishers.index');

require __DIR__ . '/auth.php';
