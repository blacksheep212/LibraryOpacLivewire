<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

// Home Route
Route::get('/', function () {
    return view('admin.admin');
})->name('home');

// Admin Routes Group
Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Add Items (matches your nav menu)
    Route::get('/add', [AdminController::class, 'add'])->name('admin.add');

    // User Management (corrected from 'user' to 'users')
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');

    // School Information
    Route::get('/school', [AdminController::class, 'school'])->name('admin.school');

    // Update School Information
    Route::get('/update-school', [AdminController::class, 'updateSchool'])->name('admin.update-school');

    // Account Settings
    Route::get('/account-settings', [AdminController::class, 'accountSettings'])->name('admin.account-settings');

    // History Log
    Route::get('/history', [AdminController::class, 'history'])->name('admin.history');
});
    // Manage Accounts
    Route::get('/manage-accounts', function () {
        return view('admin.manageAccount');
    })->name('admin.manage-accounts');

    // School Information
    Route::get('/school', function () {
        return view('admin.school');
    })->name('admin.school');

    // Update School Information
    Route::get('/update-school', function () {
        return view('admin.updateSchoolInformation');
    })->name('admin.update-school');

    // Update User
    Route::get('/update-user', function () {
        return view('admin.updateUser');
    })->name('admin.update-user');

    // User Management
    Route::get('/users', function () {
        return view('admin.user');
    })->name('admin.users');
});

// Staff Routes Group
Route::prefix('staff')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('staff.staff');
    })->name('staff.dashboard');

    Route::post('/borrow', [StaffController::class, 'processBorrow'])
        ->name('staff.borrow');


// Common Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')
        ->name('settings.profile');
    Volt::route('settings/password', 'settings.password')
        ->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')
        ->name('settings.appearance');
});

// Authentication Routes
require __DIR__.'/auth.php';
