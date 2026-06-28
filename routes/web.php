<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class,'home'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth'])->name('admin');

    Route::get('blog', [BlogController::class, 'blog'])->name('blog');
    Route::post('create_blog', [BlogController::class, 'create_blog'])->name('create_blog');
    Route::post('store_booking',[BookingController::class,'store_booking'])->name('store_booking');
    Route::get('edit_blog/{id}', [BlogController::class, 'edit_blog'])->name('edit_blog');
    Route::post('update_blog/{id}', [BlogController::class, 'update_blog'])->name('update_blog');
    Route::post('update_blog/{id}', [BlogController::class, 'update_blog'])->name('update_blog');
    Route::post('delete_blog/{id}', [BlogController::class, 'delete_blog'])->name('delete_blog');
    Route::get('booking_detail', [BookingController::class, 'booking_detail'])->name('booking_detail');
    Route::post('update_booking/{id}', [BookingController::class, 'update_booking'])->name('update_booking');
    Route::get('booking/{id}',[BookingController::class,'booking'])->name('booking');

    Route::post('store_room', [RoomController::class, 'store_room'])->name('store_room');
    Route::get('create_room',[RoomController::class,'create_room'])->name('create_room');
    Route::get('view_room',[RoomController::class,'view_room'])->name('view_room');
    Route::get('detail_room/{id}',[RoomController::class,'detail_room'])->name('detail_room');
    Route::get('edit_room/{id}',[RoomController::class,'edit_room'])->name('edit_room');
    Route::post('update_room/{id}',[RoomController::class,'update_room'])->name('update_room');
    Route::post('delete_room/{id}',[RoomController::class,'delete_room'])->name('delete_room');

    Route::get('gallery',[GalleryController::class,'gallery'])->name('gallery');
    Route::post('upload_photo',[GalleryController::class,'upload_photo'])->name('upload_photo');
    Route::post('delete_photo/{id}',[GalleryController::class,'delete_photo'])->name('delete_photo');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
