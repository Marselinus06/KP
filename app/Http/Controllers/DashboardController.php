<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function home()
    {
        $totalUsers = User::count();
        $totalWaste = Transaction::where('status', 'Completed')->sum('total_weight');
        $totalTransactions = Transaction::count();
        $recentTransactions = Transaction::with('user')->latest()->take(5)->get();


        $userStatsData = User::select(
            DB::raw('COUNT(id) as count'),
            DB::raw("DATE_FORMAT(created_at, '%b') as month")
        )->where('created_at', '>', now()->subMonths(6))
         ->groupBy('month')
         ->pluck('count', 'month')->all();

        $userStats = [
            'categories' => array_keys($userStatsData),
            'data' => array_values($userStatsData)
        ];

        return view('dashboard.home', compact('totalUsers', 'totalWaste', 'totalTransactions', 'recentTransactions', 'userStats'));
    }
}