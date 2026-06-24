<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class,'index']);
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth'])->name('admin');

Route::get('booking_detail', [BookingController::class, 'booking_detail'])->middleware(['auth'])->name('booking_detail');


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
