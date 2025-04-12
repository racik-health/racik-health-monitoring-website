<?php

use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Dashboard\ConsumptionReportController;
use App\Http\Controllers\Admin\Dashboard\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\Dashboard\DispenserController as AdminDispenserController;
use App\Http\Controllers\Admin\Dashboard\HerbalMedicineController;
use App\Http\Controllers\Admin\Dashboard\PatientController;
use App\Http\Controllers\Frontend\Auth\LoginController as FrontendLoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController as FrontendRegisterController;
use App\Http\Controllers\Frontend\Dashboard\ConsumptionHistoryController;
use App\Http\Controllers\Frontend\Dashboard\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\Dashboard\DispenserController as FrontendDispenserController;
use App\Http\Controllers\Frontend\Dashboard\RecommendationController;
use App\Http\Controllers\Frontend\Dashboard\SymptomController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
 * ---------------------------------------------------------------------------------------
 * Admin Routes
 * ---------------------------------------------------------------------------------------
 */
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth
    Route::controller(AdminLoginController::class)->group(function () {
        Route::get('/login', 'index')->middleware('guest')->name('login');
        Route::post('/login', 'authenticate')->middleware('guest')->name('auth');
        Route::get('/logout', 'logout')->middleware(['auth', 'role:admin'])->name('logout');
    });

    Route::middleware('admin')->group(function () {
        // Dashboard
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        // Patients Management
        Route::resource('patients', PatientController::class)->except('show');
        // Herbal Medicines Management
        Route::resource('herbal-medicines', HerbalMedicineController::class)->except('show');
        // Dispenser Monitoring
        Route::get('/dispensers/monitor', [AdminDispenserController::class, 'index'])->name('dispensers.monitor');
        // Consumption Reports
        Route::resource('consumption-reports', ConsumptionReportController::class);
    });
});

/*
 * ---------------------------------------------------------------------------------------
 * Frontend Routes
 * ---------------------------------------------------------------------------------------
 */
// Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('patient')->name('patient.')->group(function () {
    // Auth
    Route::controller(FrontendLoginController::class)->middleware('guest')->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate')->name('auth');
        Route::get('/logout', 'logout')->withoutMiddleware('guest')->middleware(['auth', 'role:patient'])->name('logout');
    });

    // Register
    Route::controller(FrontendRegisterController::class)->middleware('guest')->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/register', 'store')->name('store');
    });

    Route::middleware('patient')->group(function () {
        // Dashboard
        Route::get('/', [FrontendDashboardController::class, 'index'])->name('dashboard');
        // Health Input
        Route::get('/complaint', [SymptomController::class, 'index'])->name('complaints.index');
        Route::post('/complaint', [SymptomController::class, 'store'])->name('complaints.store');
        // Dispenser Control
        Route::get('/dispenser/control', [FrontendDispenserController::class, 'control'])->name('dispensers.controls');
        Route::get('/dispenser/status', [FrontendDispenserController::class, 'status'])->name('dispensers.status');
        // Recommendations
        Route::get('/recommendation', [RecommendationController::class, 'index'])->name('recommendations.index');
        // Consumption History
        Route::resource('consumption-history', ConsumptionHistoryController::class);
    });
});
