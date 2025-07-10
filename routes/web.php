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

    Route::get('/add/book', function () {
        return view('add.book'); // resources/views/add/book.blade.php
    })->name('admin.add.book');

    Route::get('/add/electronic', function () {
        return view('add.electronic'); // resources/views/add/electronic.blade.php
    })->name('admin.add.electronic');

    Route::get('/add/periodical', function () {
        return view('add.periodical'); // resources/views/add/periodical.blade.php
    })->name('admin.add.periodical');

    Route::get('/add/thesis', function () {
        return view('add.thesis'); // resources/views/add/thesis.blade.php
    })->name('admin.add.thesis');

    // Update routes - using your existing files
    Route::get('/update', function () {
        return view('update.update'); // resources/views/update/update.blade.php
    })->name('admin.update');

    Route::get('/update/book', function () {
        return view('update.book'); // resources/views/update/book.blade.php
    })->name('admin.update.book');

    Route::get('/update/electronic', function () {
        return view('update.electronic'); // resources/views/update/electronic.blade.php
    })->name('admin.update.electronic');

    Route::get('/update/periodical', function () {
        return view('update.periodical'); // resources/views/update/periodical.blade.php
    })->name('admin.update.periodical');

    Route::get('/update/thesis', function () {
        return view('update.thesis'); // resources/views/update/thesis.blade.php
    })->name('admin.update.thesis');

    Route::get('/update/user', function () {
        return view('update.user'); // resources/views/update/user.blade.php
    })->name('admin.update.user');

    Route::get('/update/school-info', function () {
        return view('update.school'); // resources/views/update/school.blade.php
    })->name('admin.update.school-info');

    //collges
    Route::get ('/update/updateCollege',function () {
        return view('update.updateCollege'); // resources/views/update/updateCollege.blade.php
    })->name('admin.update.updateCollege');

    //departments
    Route::get ('/update/updateDepartment',function () {
        return view('update.updateDepartment'); // resources/views/update/updateDepartment.blade.php
    })->name('admin.update.updateDepartment');

    //offices
    Route::get ('/update/updateOffice',function () {
        return view('update.updateOffice'); // resources/views/update/updateOffice.blade.php
    })->name('admin.update.updateOffice');

    Route::get ('/update/updateProgram',function () {
        return view('update.updateProgram'); //resources/views/update/updateProgram.blade.php
    })->name('admin.update.updateProgram');


    // Account routes - using your existing files
    Route::get('/accounts', function () {
        return view('accounts.account'); // resources/views/accounts/account.blade.php
    })->name('admin.accounts');

    Route::get('/accounts/manage', function () {
        return view('accounts.manage'); // resources/views/accounts/manage.blade.php
    })->name('admin.accounts.manage');

    // Other routes - need to be created
    Route::get('/accounts/account-settings', function () {
        return view('accounts.account-settings'); // resources/views/accounts/account-settings.blade.php
    })->name('admin.account-settings');

    Route::get('/history', function () {
        return view('admin.history'); // resources/views/admin/history.blade.php
    })->name('admin.history');
});
