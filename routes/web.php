<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservation');

    Route::get('/admin/customers', [CustomerController::class, 'index'])->name('admin.customer');
    Route::post('/admin/customers/store', [CustomerController::class, 'store'])->name('admin.customer.store');
    Route::post('/admin/customers/update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
    Route::post('/admin/customers/destroy/{id}', [CustomerController::class, 'destroy'])->name('admin.customer.destroy');

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
});
Route::group(['middleware' => ['checkrole:3']], function () {
    Route::resource('/customer', UserController::class);
});

Route::resource('/reservation', ReservationController::class);
Route::resource('/admincustomer', CustomerController::class);

// Route::group(['middleware' => ['checkislogin']], function () {
//     Route::get('/about', [HomeController::class, 'about'])->name('home.about');
//     Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
// });

Route::get('/404', function () {
    return response()->view('guest.404', [], 404);
})->name('404');
