<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ToggleController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');

    Route::get('/blog-list', [BlogController::class, 'blogList'])->name('blog-list');
    Route::get('/add-blog', [BlogController::class, 'addBlog'])->name('add-blogs');
    Route::post('/insert-blog', [BlogController::class, 'InsertBlog'])->name('insert-blogs');
    Route::get('/blog-show/{slug}', [BlogController::class, 'BlogShow'])->name('blog.show');
    Route::get('/update-blog/{slug}', [BlogController::class, 'UpdateBlog'])->name('update-blog');
    Route::post('/update/{slug}', [BlogController::class, 'updateBlogsData'])->name('update.blogs');
    Route::get('/delete-blog/{id}', [BlogController::class, 'DeleteBlog'])->name('delete-blog');
    Route::post('/toggle-status', [ToggleController::class, 'BlogStatus'])->name('toggle-status');
    ROute::get('/product-list', [ProductController::class, 'productList'])->name('product-list');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
