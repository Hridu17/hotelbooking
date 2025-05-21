<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\RoomBookingEsewaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\StandardRoomController;
use App\Http\Controllers\Admin\DeluxeRoomController;
use App\Http\Controllers\Admin\FamilyRoomController;
use App\Http\Controllers\Admin\ExecutiveRoomController;

// Home Page
Route::get('/', [FrontendController::class, 'index'])->name('home');
// User routes (auth protected)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Booking
Route::post('/book-room', [RoomBookingController::class, 'store'])->name('room.book');

// eSewa
Route::post('/book-room/esewa', [RoomBookingEsewaController::class, 'pay'])->name('room.book.esewa');
Route::get('/booking/payment/check/{id}', [RoomBookingEsewaController::class, 'check'])->name('booking.esewa.check');
Route::get('/booking/payment-failed', [RoomBookingEsewaController::class, 'paymentFailed'])->name('booking.payment.failed');

// Contact
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// Admin routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    // Admin profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // -------------------- EVENTS --------------------
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    // -------------------- STANDARD ROOMS --------------------
    Route::get('/rooms/standard', [StandardRoomController::class, 'index'])->name('rooms.standard.index');
    Route::get('/rooms/standard/create', [StandardRoomController::class, 'create'])->name('rooms.standard.create');
    Route::post('/rooms/standard', [StandardRoomController::class, 'store'])->name('rooms.standard.store');
    Route::get('/rooms/standard/{standard}/edit', [StandardRoomController::class, 'edit'])->name('rooms.standard.edit');
    Route::put('/rooms/standard/{standard}', [StandardRoomController::class, 'update'])->name('rooms.standard.update');
    Route::delete('/rooms/standard/{standard}', [StandardRoomController::class, 'destroy'])->name('rooms.standard.destroy');
    // -------------------- DELUXE ROOMS --------------------
    Route::get('/rooms/deluxe', [DeluxeRoomController::class, 'index'])->name('rooms.deluxe.index');
    Route::get('/rooms/deluxe/create', [DeluxeRoomController::class, 'create'])->name('rooms.deluxe.create');
    Route::post('/rooms/deluxe', [DeluxeRoomController::class, 'store'])->name('rooms.deluxe.store');
    Route::get('/rooms/deluxe/{deluxe}/edit', [DeluxeRoomController::class, 'edit'])->name('rooms.deluxe.edit');
    Route::put('/rooms/deluxe/{deluxe}', [DeluxeRoomController::class, 'update'])->name('rooms.deluxe.update');
    Route::delete('/rooms/deluxe/{deluxe}', [DeluxeRoomController::class, 'destroy'])->name('rooms.deluxe.destroy');

    // -------------------- FAMILY ROOMS --------------------
    Route::get('/rooms/family', [FamilyRoomController::class, 'index'])->name('rooms.family.index');
    Route::get('/rooms/family/create', [FamilyRoomController::class, 'create'])->name('rooms.family.create');
    Route::post('/rooms/family', [FamilyRoomController::class, 'store'])->name('rooms.family.store');
    Route::get('/rooms/family/{family}/edit', [FamilyRoomController::class, 'edit'])->name('rooms.family.edit');
    Route::put('/rooms/family/{family}', [FamilyRoomController::class, 'update'])->name('rooms.family.update');
    Route::delete('/rooms/family/{family}', [FamilyRoomController::class, 'destroy'])->name('rooms.family.destroy');

    // -------------------- EXECUTIVE ROOMS --------------------
    Route::get('/rooms/executive', [ExecutiveRoomController::class, 'index'])->name('rooms.executive.index');
    Route::get('/rooms/executive/create', [ExecutiveRoomController::class, 'create'])->name('rooms.executive.create');
    Route::post('/rooms/executive', [ExecutiveRoomController::class, 'store'])->name('rooms.executive.store');
    Route::get('/rooms/executive/{executive}/edit', [ExecutiveRoomController::class, 'edit'])->name('rooms.executive.edit');
    Route::put('/rooms/executive/{executive}', [ExecutiveRoomController::class, 'update'])->name('rooms.executive.update');
    Route::delete('/rooms/executive/{executive}', [ExecutiveRoomController::class, 'destroy'])->name('rooms.executive.destroy');

    // -------------------- BOOKINGS --------------------
    Route::get('/room-bookings', [RoomBookingController::class, 'adminIndex'])->name('room.bookings');
    Route::get('/room-bookings/{id}', [RoomBookingController::class, 'show'])->name('room.bookings.show');
    Route::post('/room-bookings/{id}/status', [RoomBookingController::class, 'updateStatus'])->name('room.bookings.updateStatus');

    // Optional user booking list
    Route::get('/user-bookings', [RoomBookingController::class, 'userBookings'])->name('room.bookings.user');

    // Contact messages
    Route::get('/contact-messages', [ContactController::class, 'adminIndex'])->name('contact.index');
});

// Optional frontend events page
Route::get('/frontend/events', [EventController::class, 'showFrontend'])->name('frontend.events');

// Auth
require __DIR__ . '/auth.php';
