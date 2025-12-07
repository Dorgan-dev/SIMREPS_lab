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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/register', [HomeController::class, 'register'])->name('home.register');
Route::get('/room', [HomeController::class, 'room'])->name('home.room');
Route::get('/console', [HomeController::class, 'console'])->name('home.console');

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
        Route::resource('/rooms', RoomController::class);
        Route::resource('/reservations', ReservationController::class);
        Route::resource('/consoles', ConsoleController::class);

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/photo/update', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
        Route::post('/profile/password', [ProfileController::class, 'changePassword'])->name('change-password');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings/logo', [SettingController::class, 'updateLogo'])->name('settings.update.logo');
        Route::delete('/settings/logo', [SettingController::class, 'deleteLogo'])->name('settings.delete.logo');
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

        Route::get('/', function () {
            return view('_customer.index');
        })->name('dashboard');

        Route::post('/reservation', [ReservationController::class, 'customerStore'])->name('reservation.store');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'changePassword'])->name('change-password');
    });
