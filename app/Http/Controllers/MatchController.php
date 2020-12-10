<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\User;
use App\Models\Match;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Chovanec\Rating\Rating;
use GrahamCampbell\ResultType\Result;

class MatchController extends Controller
{
    public function create()
    {
        $name = Auth::user()->name;
        $users = User::all();
        
        return view('match/create', compact('name', 'users'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'playerone' => 'required',
            'playertwo' => 'required',
            'scoreone' => 'required|min:0|max:11',
            'scoretwo' => 'required|min:0|max:11',
        ]);
        
        $playerone = $request->only('playerone');
        $scoreone = $request->only('scoreone');
        $playertwo = $request->only('playertwo');
        $scoretwo = $request->only('scoretwo');


        if($scoreone['scoreone'] > $scoretwo['scoretwo'])
        {
            $playeronewin = 1;
            $playertwowin = 0;
        }
        else{
            $playertwowin = 1;
            $playeronewin = 0;
        }

        $playerone = User::where('id', $playerone)->first();
        $playertwo = User::where('id', $playertwo)->first();

        $playeroneoldrating = $playerone->rating;
        $playertwooldrating = $playertwo->rating;

        require 'C:/xampp/htdocs/TableTennisApp/vendor/chovanec/elo-rating/src\Rating\Rating.php';

        if($playeronewin){
            $rating = new Rating($playeroneoldrating, $playertwooldrating, Rating::WIN, Rating::LOST);
            $results = $rating->getNewRatings();
            $playerone->rating = $results['a'];
            $playertwo->rating = $results['b'];
        }
        else{
            $rating = new Rating($playeroneoldrating, $playertwooldrating, Rating::LOST, Rating::WIN);
            $results = $rating->getNewRatings();
            $playerone->rating = $results['a'];
            $playertwo->rating = $results['b'];
        }

        $playerone->save();
        $playertwo->save();

        // Create a new match
        $newmatch = new Match();
        $newmatch->P1 = $playerone->id;
        $newmatch->P1score = $scoreone['scoreone'];
        $newmatch->P1oldrating = $playeroneoldrating;
        $newmatch->P1newrating = $playerone->rating;
        $newmatch->P2 = $playertwo->id;
        $newmatch->P2score = $scoretwo['scoretwo'];
        $newmatch->P2oldrating = $playertwooldrating;
        $newmatch->P2newrating = $playertwo->rating;
        if($playeronewin){
            $newmatch->P1win = TRUE;
        }
        else{
            $newmatch->P2win = TRUE;
        }
        $newmatch->save();

        $playerone->matches()->attach($newmatch);
        $playertwo->matches()->attach($newmatch);
       
        // Redirect
        return redirect()->route('match.success');
    }

    public function success()
    {
        $name = Auth::user()->name;
        return view('match/success', compact('name'));
    }
}
