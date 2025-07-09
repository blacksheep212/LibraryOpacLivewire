<?php

use Illuminate\Support\Facades\Route;

// Redirect root URL to the admin dashboard
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    // Dashboard - points to existing admin.blade.php
    Route::get('/', function () {
        return view('admin.admin'); // resources/views/admin/admin.blade.php
    })->name('admin.dashboard');

    // Add routes - adjusted to match your actual files
    Route::get('/add', function () {
        return view('add.add'); // resources/views/add/add.blade.php
    })->name('admin.add');

    Route::get('/add/user', function () {
        return view('add.user'); // resources/views/add/user.blade.php
    })->name('admin.add.user');

    Route::get('/add/school', function () {
        return view('add.school'); // resources/views/add/school.blade.php
    })->name('admin.add.school');

    // Update routes - using your existing files
    Route::get('/update', function () {
        return view('update.update'); // resources/views/update/update.blade.php
    })->name('admin.update');

    Route::get('/update/user', function () {
        return view('update.user'); // resources/views/update/user.blade.php
    })->name('admin.update.user');

    Route::get('/update/school-info', function () {
        return view('update.school'); // resources/views/update/school.blade.php
    })->name('admin.update.school-info');

    // Account routes - using your existing files
    Route::get('/accounts', function () {
        return view('accounts.account'); // resources/views/accounts/account.blade.php
    })->name('admin.accounts');

    Route::get('/accounts/manage', function () {
        return view('accounts.manage'); // resources/views/accounts/manage.blade.php
    })->name('admin.accounts.manage');

    // Other routes - need to be created
    Route::get('/account-settings', function () {
        return view('admin.settings'); // resources/views/admin/settings.blade.php
    })->name('admin.account-settings');

    Route::get('/history', function () {
        return view('admin.history'); // resources/views/admin/history.blade.php
    })->name('admin.history');
});
