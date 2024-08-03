<?php

namespace App\Http\Controllers;

use App\Models\TotalSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Получение общей суммы заработка
        $totalEarnings = TotalSalary::where('user_id', $user->id)->sum('money');

        // Получение заработка за текущий месяц
        $currentMonthEarnings = TotalSalary::where('user_id', $user->id)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('money');

        return view('dashboard', compact('totalEarnings', 'currentMonthEarnings'));
    }
}
