<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BorrowController;

// Routes for view pages
Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/borrow_book/{id}',[HomeController::class,'borrow_book'])->name('borrow.book');
Route::get('/book_history',[HomeController::class,'book_history'])->name('book.history');
Route::get('/request_cancel/{id}',[HomeController::class,'request_cancel'])->name('request.cancel');
Route::get('/explore',[HomeController::class,'home_explore'])->name('home.explore');
Route::get('/search',[HomeController::class,'book_search'])->name('book.search');
Route::get('/cat_search/{id}',[HomeController::class,'cat_search'])->name('category.search');
Route::get('/book_details/{id}',[HomeController::class,'book_details'])->name('book.details');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

// Routes for admin
route::get('/home',[AdminController::class,'index'])->name('admin.home')->middleware(['auth','admin']);
route::get('/category_page',[AdminController::class,'category_page'])->name('index')->middleware(['auth','admin']);
route::Post('/category_create',[AdminController::class,'category_create'])->name('create.category')->middleware(['auth','admin']);
route::get('/category_delete/{id}',[AdminController::class,'category_delete'])->name('delete.category')->middleware(['auth','admin']);
route::get('/category_edit/{id}',[AdminController::class,'category_edit'])->name('edit.category')->middleware(['auth','admin']);
route::post('/category_update/{id}',[AdminController::class,'category_update'])->name('update.cat')->middleware(['auth','admin']);

Route::get('/index_book', [BookController::class, 'index'])->name('index.book')->middleware(['auth','admin']);
route::get('/add_book',[BookController::class,'create'])->name('add.book')->middleware(['auth','admin']);
Route::post('/store_book', [BookController::class, 'store'])->name('store.book')->middleware(['auth','admin']);
Route::get('/delete_book/{id}',[BookController::class,'destroy'])->name('delete.book')->middleware(['auth','admin']);
Route::get('/edit_book/{id}',[BookController::class,'edit'])->name('edit.book')->middleware(['auth','admin']);
Route::Post('/update_book/{id}',[BookController::class,'update'])->name('update.book')->middleware(['auth','admin']);

Route::get('/borrow_request',[BorrowController::class,'index'])->name('borrow.request')->middleware(['auth','admin']);
Route::get('/approve_book/{id}',[BorrowController::class,'approve_book'])->name('approve.book')->middleware(['auth','admin']);
Route::get('/returned_book/{id}',[BorrowController::class,'returned_book'])->name('returned.book')->middleware(['auth','admin']);
Route::get('/rejected_book/{id}',[BorrowController::class,'rejected_book'])->name('reject.book')->middleware(['auth','admin']);
Route::get('/delete_request/{id}',[BorrowController::class,'Destroy'])->name('delete.request')->middleware(['auth','admin']);

