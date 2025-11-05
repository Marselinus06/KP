<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function home()
    {
        return view('dashboard.home');
    }

    public function users()
    {
        $users = User::all();
        return view('dashboard.userslayout', ['users' => $users]);
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