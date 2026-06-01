<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ReviewController;

Route::get('/',           [PublicController::class, 'home'])->name('home');
Route::get('/servizi',    [PublicController::class, 'services'])->name('services');
Route::get('/portfolio',  [PublicController::class, 'portfolio'])->name('portfolio');
Route::get('/chi-siamo',  [PublicController::class, 'about'])->name('about');
Route::get('/prezzi',     [PublicController::class, 'pricing'])->name('pricing');
Route::get('/contatti',   [PublicController::class, 'contact'])->name('contact');
Route::post('/contatti',  [PublicController::class, 'sendMessage'])->name('contact.send');
Route::get('/booking',    [PublicController::class, 'booking'])->name('booking');
Route::post('/booking',   [PublicController::class, 'storeBooking'])->name('booking.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('services',  ServiceController::class);
        Route::resource('portfolio', PortfolioController::class);
        Route::resource('reviews',   ReviewController::class);

        Route::get('bookings',                     [BookingController::class, 'index'])->name('bookings.index');
        Route::get('bookings/{booking}',           [BookingController::class, 'show'])->name('bookings.show');
        Route::patch('bookings/{booking}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
        Route::patch('bookings/{booking}/cancel',  [BookingController::class, 'cancel'])->name('bookings.cancel');
        Route::delete('bookings/{booking}',        [BookingController::class, 'destroy'])->name('bookings.destroy');

        Route::get('messages',                 [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}',       [MessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}',    [MessageController::class, 'destroy'])->name('messages.destroy');
        Route::patch('messages/{message}/read',[MessageController::class, 'markRead'])->name('messages.read');
    });
});
