<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


// Route for the root URL to display posts index
Route::get('/', [PostController::class, 'index'])->name('home');

// Public routes for posts (index and show are accessible to all)
Route::resource('posts', PostController::class)->only([
    'index', 'show', 'create'
]);

// Protected routes for posts (create, edit, update, delete)
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->except([
        'index', 'show'
    ]);
	Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
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
