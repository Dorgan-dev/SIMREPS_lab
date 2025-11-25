<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Middleware\CheckIsLogin;
use App\Models\Reservation;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('checkislogin');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/login', [HomeController::class, 'login'])->name('home.login');
Route::get('/register', [HomeController::class, 'register'])->name('home.register');

Route::post('/auth/login', [AuthenticationController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthenticationController::class, 'register'])->name('auth.register');
Route::get('/auth/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');

// Route::group(['middleware' => ['checkrole']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservation');
    Route::get('/admin/customers', [AdminController::class, 'customer'])->name('admin.customer');
// });

Route::resource('/reservation', ReservationController::class);
Route::resource('customer', CustomerController::class);

Route::group(['middleware' => ['checkislogin']], function () {
    Route::get('/about', [HomeController::class, 'about'])->name('home.about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
});

// Route::get('/', function () {
//     return view('guest.index')->name('dashboard');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::resource('reservation', ReservasiController::class);
// });

// require __DIR__ . '/auth.php';
