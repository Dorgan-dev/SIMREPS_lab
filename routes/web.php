<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthenticationController;


use App\Http\Controllers\Customer\BookingController;
use App\Http\Controllers\CustomerController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/register', [HomeController::class, 'register'])->name('home.register');
Route::get('/rooms', [HomeController::class, 'rooms'])->name('home.rooms');
Route::get('/rooms/{id}', [HomeController::class, 'show'])->name('room.detail');
Route::get('/consoles', [HomeController::class, 'console'])->name('home.consoles');
Route::get('/reservasi-hari-ini', [ReservationController::class, 'today'])->name('reservation.today');
Route::get('/reservasi-mendatang', [ReservationController::class, 'upcoming'])->name('reservation.upcoming');


Route::get('/auth/google', [AuthenticationController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/auth/google/callback', [AuthenticationController::class, 'handleGoogleCallback'])->name('google.callback');

Route::middleware('checkguest')->group(function () {
    Route::get('/auth', [AuthenticationController::class, 'index'])->name('auth');
    Route::get('/login', [HomeController::class, 'login'])->name('home.login');
    Route::post('/auth/login', [AuthenticationController::class, 'login'])->name('auth.login');
    Route::post('/auth/register', [AuthenticationController::class, 'register'])->name('auth.register');
});

Route::middleware('checkislogin')->post('/auth/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');

Route::middleware(['checkislogin', 'checkrole:1'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('/customers', UserController::class);
        Route::get('/staff', [UserController::class, 'staff'])->name('staff.index');
        Route::resource('/rooms', RoomController::class);
        Route::resource('/reservations', ReservationController::class);
        Route::resource('/consoles', ConsoleController::class);

        // ✅ REQUEST (PENDING)
        Route::get('/reservations-pending', [ReservationController::class, 'pending'])
            ->name('reservations.pending');

        Route::post('/reservations/{id}/approve', [ReservationController::class, 'approve'])
            ->name('reservations.approve');

        Route::post('/reservations/{id}/reject', [ReservationController::class, 'reject'])
            ->name('reservations.reject');

        // ✅ ONGOING
        Route::get('/reservations-ongoing', [ReservationController::class, 'running'])
            ->name('reservations.ongoing');

        // ✅ HISTORY (ALL)
        Route::get('/reservations-history', [ReservationController::class, 'history'])
            ->name('reservations.history');


        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/photo/update', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
        Route::post('/profile/password', [ProfileController::class, 'changePassword'])->name('change-password');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings/logo', [SettingController::class, 'updateLogo'])->name('settings.update.logo');
        Route::delete('/settings/logo', [SettingController::class, 'deleteLogo'])->name('settings.delete.logo');

        Route::get('/settings/rooms/{id}/images', [SettingController::class, 'roomImages'])->name('room.images.index');
        Route::post('/settings/rooms/images/upload', [SettingController::class, 'uploadRoomImages'])->name('room.images.upload');
        Route::post('/settings/rooms/images/{id}/primary', [SettingController::class, 'setPrimaryRoomImage'])->name('room.images.primary');
        Route::delete('/settings/rooms/images/{id}', [SettingController::class, 'deleteRoomImage'])->name('room.images.delete');

        Route::get('/settings/consoles/{id}/images', [SettingController::class, 'consoleImages'])->name('console.images.index');
        Route::post('/settings/consoles/images/upload', [SettingController::class, 'uploadConsoleImages'])->name('console.images.upload');
        Route::put('/settings/consoles/images/{id}/primary', [SettingController::class, 'setPrimaryConsoleImage'])->name('console.images.primary');
        Route::delete('/settings/consoles/images/{id}', [SettingController::class, 'deleteConsoleImage'])->name('console.images.delete');
    });

Route::middleware(['checkislogin', 'checkrole:2'])
    ->prefix('resepsionist')
    ->name('resepsionist.')
    ->group(function () {

        Route::get('/', function () {
            return view('_resepsionist.index');
        })->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'changePassword'])->name('change-password');
    });

Route::middleware(['checkislogin', 'checkrole:3'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/', [CustomerController::class, 'index'])->name('dashboard');


        Route::post('/reservation', [ReservationController::class, 'customerStore'])->name('reservation.store');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'changePassword'])->name('change-password');
    });

Route::get('404', function ($id) {})->name('404');

// CUSTOMER

Route::middleware(['auth', 'checkrole:3'])->prefix('booking')->name('booking.')->group(function () {

    // Halaman riwayat booking user
    Route::get('/', [BookingController::class, 'index'])->name('index');

    // Halaman daftar console untuk booking baru
    Route::get('/consoles', [BookingController::class, 'showConsoles'])->name('consoles');

    // Halaman pilih jadwal untuk console tertentu
    Route::get('/{console}/schedule', [BookingController::class, 'showSchedule'])->name('schedule');

    // Check availability (AJAX)
    Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('check');

    // Simpan booking
    Route::post('/store', [BookingController::class, 'store'])->name('store');

    // Detail booking
    Route::get('/{reservation}/detail', [BookingController::class, 'detail'])->name('detail');

    // Batalkan booking
    Route::put('/{reservation}/cancel', [BookingController::class, 'cancel'])->name('cancel');
});
