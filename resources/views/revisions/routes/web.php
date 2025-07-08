<?php

use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix('admin')->group(function () {
    // Dashboard - Make this the default admin route
    Route::get('/', function () {
        return view('livewire.admin');
    })->name('admin.dashboard');


    // Add routes
    Route::get('/add', function () {
        return view('livewire.add.add');
    })->name('admin.add');

    Route::get('/add/books', function () {
        return view('livewire.add.book');
    })->name('admin.add.books');

    Route::get('/add/electronic', function () {
        return view('livewire.add.electronic');
    })->name('admin.add.electronic');

    Route::get('/add/periodical', function () {
        return view('livewire.add.periodical');
    })->name('admin.add.periodical');

    Route::get('/add/thesis', function () {
        return view('livewire.add.thesis');
    })->name('admin.add.thesis');

    Route::get('/add/user', function () {
        return view('livewire.add.user');
    })->name('admin.add.user');

    Route::get('/add/school', function () {
        return view('livewire.add.school');
    })->name('admin.add.school');

    // Update routes
    Route::get('/update', function () {
        return view('livewire.update.update');
    })->name('admin.update');

    Route::get('/update/user', function () {
        return view('livewire.update.user');
    })->name('admin.update.user');

    Route::get('/update/school-info', function () {
        return view('livewire.update.school');
    })->name('admin.update.school-info');

    // Accounts routes
    Route::get('/accounts', function () {
        return view('livewire.accounts.account');
    })->name('admin.accounts');

    Route::get('/accounts/manage', function () {
        return view('livewire.accounts.manage');
    })->name('admin.accounts.manage');

    // Other routes
    Route::get('/account-settings', function () {
        return view('livewire.admin.settings'); // Updated to a more specific view
    })->name('admin.account-settings');

    Route::get('/history', function () {
        return view('livewire.admin.history'); // Updated to a more specific view
    })->name('admin.history');
});
