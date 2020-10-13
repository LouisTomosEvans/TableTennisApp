<?php

namespace App\Http\Controllers;
use App\Models\Dashboard;
use App\Models\User;
use App\Models\Match;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class DashboardController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;

        return view('dashboard/dashboard', compact('name'));
    }

    public function leaderboard()
    {
        $gamecount = [];
        $name = Auth::user()->name;
        $users = User::orderBy('rating', 'DESC')->get();
        foreach($users as $user):
            if($user->matches()):
                $gamecount[$user->id] = $user->matches()->count();
            else:
                $gamecount[$user->id] = 0;
            endif;
        endforeach;

        return view('dashboard/dashboard_leaderboard', compact('name', 'users', 'gamecount'));
    }
}
