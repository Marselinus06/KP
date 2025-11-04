<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('dashboard.home');
    }

    public function users()
    {
        return view('dashboard.userslayout');
    }

    public function wasteData()
    {
        return view('dashboard.wastedatalayout');
    }

    public function transactions()
    {
        return view('dashboard.transactionlayout');
    }
}