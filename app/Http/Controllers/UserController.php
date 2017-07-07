<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Match;
use App\Models\Bet;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $matches = Match::where('public', Match::PUBLIC_MATCH)->where('done',Match::NOT_DONE)->get();
        return view('user.bet')->with('matches',$matches);
    }

    public function show($id)
    {
        $match = Match::find($id);
        $home_number = Bet::where('match_id',$id)->where('bet_choice',Match::HOME)->count();
        $draw_number = Bet::where('match_id',$id)->where('bet_choice',Match::DRAW)->count();
        $away_number = Bet::where('match_id',$id)->where('bet_choice',Match::AWAY)->count();
        return view('user.bet_detail',[
            'match' => $match,
            'home_number' => $home_number,
            'draw_number' => $draw_number,
            'away_number' => $away_number
        ]);
    }

    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $user->acc_money = $user->acc_money - ($request->home_bet + $request->draw_bet + $request->away_bet);
        $user->save();
        $match = Match::find($request->match_id);
        if($request->home_bet > 0){
            $bet = new Bet();

            $bet->user_id = $request->user_id;
            $bet->match_id = $request->match_id;
            $bet->bet_choice = Match::HOME;
            $bet->quantity = $request->home_bet;
            $bet->rate = $match->home_rate;
            $bet->profit = 0;

            $bet->save();
        }

        if($request->draw_bet > 0){
            $bet = new Bet();

            $bet->user_id = $request->user_id;
            $bet->match_id = $request->match_id;
            $bet->bet_choice = Match::DRAW;
            $bet->quantity = $request->draw_bet;
            $bet->rate = $match->draw_rate;
            $bet->profit = 0;

            $bet->save();
        }

        if($request->away_bet > 0){
            $bet = new Bet();

            $bet->user_id = $request->user_id;
            $bet->match_id = $request->match_id;
            $bet->bet_choice = Match::AWAY;
            $bet->quantity = $request->away_bet;
            $bet->rate = $match->away_rate;
            $bet->profit = 0;

            $bet->save();
        }

        return redirect()->route('user.index');
    }

    public function showHistory()
    {
        $bets = Bet::where('user_id', Auth::id())->with('match')->get();
        return view('user.history')->with('bets',$bets);
    }
}
