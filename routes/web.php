<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

// Movie
Route::name('movie.')->group(function () {
    Route::get('/list', [BookingController::class, 'index'])
        ->name('movie.list');
    Route::get('/create', [BookingController::class, 'create'])
        ->name('movie.create');
    Route::get('/create', [BookingController::class, 'store'])
        ->name('movie.store');
    Route::get('/edit', [BookingController::class, 'edit'])
        ->name('movie.edit');
    Route::get('/edit', [BookingController::class, 'update'])
        ->name('movie.update');
    Route::get('/delete', [BookingController::class, 'destroy'])
        ->name('movie.destroy');
});

// Seat
Route::name('seat.')->group(function () {
    Route::get('/list', [SeatController::class, 'index'])
        ->name('seat.list');
    Route::get('/create', [SeatController::class, 'create'])
        ->name('seat.create');
    Route::get('/create', [SeatController::class, 'store'])
        ->name('seat.store');
    Route::get('/edit', [SeatController::class, 'edit'])
        ->name('seat.edit');
    Route::get('/edit', [SeatController::class, 'update'])
        ->name('seat.update');
    Route::get('/delete', [SeatController::class, 'destroy'])
        ->name('seat.destroy');
});

// Booking
Route::name('booking.')->group(function () {
    Route::get('/list', [BookingController::class, 'index'])
        ->name('booking.list');
    Route::get('/create', [BookingController::class, 'create'])
        ->name('booking.create');
    Route::get('/create', [BookingController::class, 'store'])
        ->name('booking.store');
    Route::get('/edit', [BookingController::class, 'edit'])
        ->name('booking.edit');
    Route::get('/edit', [BookingController::class, 'update'])
        ->name('booking.update');
    Route::get('/delete', [BookingController::class, 'destroy'])
        ->name('booking.destroy');
});