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

// Hanya tamu yang boleh akses login & register
Route::middleware('checkguest')->group(function () {
    Route::get('/auth', [AuthenticationController::class, 'index'])->name('auth');
    Route::get('/login', [HomeController::class, 'login'])->name('home.login');
    Route::post('/auth/login', [AuthenticationController::class, 'login'])->name('auth.login');
    Route::post('/auth/register', [AuthenticationController::class, 'register'])->name('auth.register');
});

// Hanya user yang sudah login yang boleh akses logout
Route::middleware('checkislogin')->group(function () {
    Route::post('/auth/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
    Route::post('/customer/reservation', [ReservationController::class, 'customerStore'])->name('customer.reservation.store');
});

Route::group(['middleware' => ['checkrole:1']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile/update', [AdminController::class, 'update'])->name('admin.profile.update');
    Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.change-password');

    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservation');

    Route::get('/admin/customers', [UserController::class, 'index'])->name('admin.customer');
    Route::post('/admin/customers/store', [UserController::class, 'store'])->name('admin.customer.store');
    Route::post('/admin/customers/update/{id}', [UserController::class, 'update'])->name('admin.customer.update');
    Route::post('/admin/customers/destroy/{id}', [UserController::class, 'destroy'])->name('admin.customer.destroy');

    Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.room');
    Route::post('/admin/rooms/store', [RoomController::class, 'store'])->name('admin.room.store');
    Route::post('/admin/rooms/update/{id}', [RoomController::class, 'update'])->name('admin.room.update');
    Route::post('/admin/rooms/destroy/{id}', [RoomController::class, 'destroy'])->name('admin.room.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/photo/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
    Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.photo.delete');

    Route::resource('/admin/consoles', ConsoleController::class, [
        'names' => [
            'index'   => 'console.index',
            'create'  => 'console.create',
            'store'   => 'console.store',
            'show'    => 'console.show',
            'edit'    => 'console.edit',
            'update'  => 'console.update',
            'destroy' => 'console.destroy',
        ],
    ]);
    Route::get('/admin/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/admin/settings/logo', [SettingController::class, 'updateLogo'])->name('settings.update.logo');
    Route::delete('/admin/settings/logo', [SettingController::class, 'deleteLogo'])->name('settings.delete.logo');
});
Route::group(['middleware' => ['checkrole:3']], function () {
    Route::resource('/customer', UserController::class);
});

Route::resource('/reservation', ReservationController::class);
Route::resource('/admincustomer', UserController::class);

Route::get('/404', function () {
    return response()->view('guest.404', [], 404);
})->name('404');

Route::get('/auth/google', [AuthenticationController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/auth/google/callback', [AuthenticationController::class, 'handleGoogleCallback'])->name('google.callback');
