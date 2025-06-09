<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ToggleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EnquiryController;

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/admin', function () {
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
    Route::post('/toggle-status-product', [ToggleController::class, 'productStatus'])->name('toggle-status-product');
    Route::get('/product-list', [ProductController::class, 'productList'])->name('product-list');
    Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
    Route::post('/insert-product', [ProductController::class, 'insertProduct'])->name('insert-product');

    Route::get('/product-show/{slug}', [ProductController::class, 'ProductShow'])->name('product.show');
    Route::get('/product-update/{slug}', [ProductController::class, 'ProductEdit'])->name('update-product');
    Route::post('/product-edit/{id}', [ProductController::class, 'UpdateProduct'])->name('edit-product');
    Route::get('/product-delete/{id}', [ProductController::class, 'ProductDelete'])->name('delete-product');

    Route::get('/enquiry-list', [EnquiryController::class, 'enquiryList'])->name('enquiry-list');
    Route::post('/send-enquiry', [EnquiryController::class, 'SendEnquery'])->name('send.enquiry');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
