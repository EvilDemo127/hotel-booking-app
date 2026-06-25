<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth'])->name('admin');



Route::get('booking_detail', [BookingController::class, 'booking_detail'])->middleware(['auth'])->name('booking_detail');
Route::post('update_booking/{id}', [BookingController::class, 'update_booking'])->middleware(['auth'])->name('update_booking');
Route::post('store_room', [RoomController::class, 'store_room'])->middleware(['auth'])->name('store_room');
Route::get('create_room',[RoomController::class,'create_room'])->middleware('auth')->name('create_room');
Route::get('view_room',[RoomController::class,'view_room'])->middleware('auth')->name('view_room');
Route::get('edit_room/{id}',[RoomController::class,'edit_room'])->middleware('auth')->name('edit_room');
Route::post('update_room/{id}',[RoomController::class,'update_room'])->middleware('auth')->name('update_room');
Route::post('delete_room/{id}',[RoomController::class,'delete_room'])->middleware('auth')->name('delete_room');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('store_booking',[BookingController::class,'store_booking'])->name('store_booking');

require __DIR__.'/auth.php';
