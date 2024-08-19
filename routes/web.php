<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Redirect root to posts index
Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Public routes for posts (index and show are accessible to all)
Route::resource('posts', PostController::class)->only([
    'index', 'show'
]);

// Protected routes for posts (create, edit, update, delete)
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->except([
        'index', 'show'
    ]);
});

// Other routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
