<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{   //listelemem var
    public function index()
    {
        $totalGames = Game::count();
        $totalPlayed = Game::sum('played_count');
        $topPlayedGames = Game::orderBy('played_count', 'DESC')->take(5)->get();
        $today=Carbon::today();
        $topTodayGames=Game::whereDate('updated_at',$today)
            ->orderBy('played_count','desc')
            ->take(5)
            ->get();
        $weekstart=Carbon::now()->startOfWeek();
        $topWeekGames=Game::whereBetween('updated_at',[$weekstart,Carbon::now()])
            ->orderBy('played_count','desc')
            ->take(5)
            ->get();
        return view('admin.dashboard.index', compact('totalGames', 'totalPlayed', 'topPlayedGames','topTodayGames','topWeekGames'));
    }
}
