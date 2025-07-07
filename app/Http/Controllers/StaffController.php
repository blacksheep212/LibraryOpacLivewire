<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff');
    }

    public function borrowReturn()
    {
        return view('staff.partials.borrow-return');
    }

    public function clearance()
    {
        return view('staff.partials.clearance');
    }

    public function inventory()
    {
        return view('staff.partials.inventory');
    }

    public function libraryBorrowedItems()
    {
        return view('staff.partials.library-borrowed-items');
    }

    public function studentWithPenalty()
    {
        return view('staff.partials.student-with-penalty');
    }

    public function transactionProfile()
    {
        return view('staff.partials.transaction-profile');
    }

    public function missingCollection()
    {
        return view('staff.partials.missing-collection');
    }
}
