<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BusmanagementController;
use App\Http\Middleware\PaymentAccess;

// === ROUTE UNTUK SUBDOMAIN DASHBOARD ===
Route::domain('dashboard.bookingbus.local')->group(function () {
    Route::get('/', [AuthController::class, 'showDashboardLogin'])->name('dashboard.index');
    Route::post('/', [AuthController::class, 'dashboardLogin']);
    Route::get('/register', [AuthController::class, 'showDashboardRegister'])->name('dashboard.register');
    Route::post('/register', [AuthController::class, 'dashboardRegister']);

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.management.index');
        Route::get('/dashboard/buses', [DashboardController::class, 'buses'])->name('dashboard.management.bus.index');
        Route::get('/dashboard/buses/create', [BusmanagementController::class, 'create'])->name('dashboard.management.bus.create');
        Route::get('/dashboard/buses/{id}', [BusmanagementController::class, 'show'])->whereNumber('id')->name('dashboard.management.bus.show');
        Route::post('/dashboard/buses', [BusmanagementController::class, 'store'])->name('dashboard.management.bus.store');
        Route::get('/dashboard/buses/edit/{id}', [BusmanagementController::class, 'edit'])->whereNumber('id')->name('dashboard.management.bus.edit');
        Route::put('/dashboard/buses/{id}', [BusmanagementController::class, 'update'])->whereNumber('id')->name('dashboard.management.bus.update');
        Route::delete('/dashboard/buses/{id}', [BusmanagementController::class, 'destroy'])->whereNumber('id')->name('dashboard.management.bus.destroy');
        Route::post('/logout', [AuthController::class, 'dashboardLogout']);
    });
});

// === ROUTE UNTUK AKSES PUBLIK TANPA LOGIN === 
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('main.login');
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/booking/{id}', [MainController::class, 'showBooking'])->name('main.showBooking');
Route::get('/search', [MainController::class, 'search'])->name('main.search');

// === ROUTE UNTUK AKSES USER SETELAH LOGIN ===
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AuthController::class, 'account'])->name('main.account');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/payment/{id}', [MainController::class, 'payment'])->name('main.payment');
    Route::get('/success', [MainController::class, 'barcode'])->middleware(PaymentAccess::class)->name('main.success');
    Route::post('/booking/store/{id}', [MainController::class, 'booking'])->name('main.booking');
});