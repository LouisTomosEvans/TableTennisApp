<?php

namespace App\Http\Controllers;
use App\Models\Dashboard;
use App\Models\User;
use App\Models\Match;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

use function PHPUnit\Framework\matches;

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

    public function statistics()
    {
        $name = Auth::user()->name;
        $currentrating = Auth::user()->rating;
        $wincount = 0;
        $losscount = 0;
        $ratingarray = [];
        $totalopp = 0;
        if(Auth::user()->matches):
            $gamecount = Auth::user()->matches->count();
            foreach(Auth::user()->matches as $match){
                if($match->P1 == Auth::user()->id)
                {
                    if(count($ratingarray) !== 0){
                        $ratingarray[] = $match->P1newrating;
                        $datearray[] = $match->created_at;
                    }
                    else{
                        $ratingarray[] = $match->P1oldrating;
                        $ratingarray[] = $match->P1newrating;
                        $datearray[] = Auth::user()->created_at;
                        $datearray[] = $match->created_at;
                    };


                    if($match->P1win == TRUE){
                        $wincount += 1;
                        $totalopp += $match->P2oldrating;
                    }
                    else{
                        $losscount += 1;
                        $totalopp += $match->P2oldrating;
                    };

                }
                elseif ($match->P2 ==Auth::user()->id) 
                {
                    if(count($ratingarray) !== 0){
                        $ratingarray[] = $match->P2newrating;
                        $datearray[] = $match->created_at;
                    }
                    else{
                        $ratingarray[] = $match->P2oldrating;
                        $ratingarray[] = $match->P2newrating;
                        $datearray[] = Auth::user()->created_at;
                        $datearray[] = $match->created_at;
                    }
                    if($match->P2win == TRUE){
                        $wincount += 1;
                        $totalopp += $match->P1oldrating;
                    }
                    else{
                        $losscount += 1;
                        $totalopp += $match->P1oldrating;
                    }
                }

            }
        endif;
        $avgopp = $totalopp/$gamecount;
        return view('dashboard/dashboard_statistics', compact('name', 'wincount', 'losscount', 'gamecount', 'ratingarray', 'datearray', 'currentrating', 'avgopp' ));
    }
}
