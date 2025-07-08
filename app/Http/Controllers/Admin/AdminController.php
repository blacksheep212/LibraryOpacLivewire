<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.admin');
    }

    public function add() {
        return view('admin.add');
    }

    public function users() {
        return view('admin.user'); // Ensure this view exists!
    }

    public function school() {
        return view('admin.school');
    }

    public function updateSchool() {
        return view('admin.updateSchoolInformation');
    }

    public function accountSettings() {
        return view('admin.accountSettingAdmin.accountSettingAi');
    }

    public function history() {
        return view('admin.history');
    }
}
