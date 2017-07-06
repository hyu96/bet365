<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Match;
use App\Bet;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $matches = Match::where('public', Match::PUBLIC_MATCH)->where('done',DONE)->get();
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
        if($request->home_bet > 0){
            $bet = new Bet();

            $bet->user_id = $request->user_id;
            $bet->match_id = $request->match_id;
            $bet->bet_choice = Match::HOME;
            $bet->quantity = $request->home_bet;
            $bet->profit = 0;

            $bet->save();
        }

        if($request->draw_bet > 0){
            $bet = new Bet();

            $bet->user_id = $request->user_id;
            $bet->match_id = $request->match_id;
            $bet->bet_choice = Match::DRAW;
            $bet->quantity = $request->draw_bet;
            $bet->profit = 0;

            $bet->save();
        }

        if($request->away_bet > 0){
            $bet = new Bet();

            $bet->user_id = $request->user_id;
            $bet->match_id = $request->match_id;
            $bet->bet_choice = Match::AWAY;
            $bet->quantity = $request->away_bet;
            $bet->profit = 0;

            $bet->save();
        }

        return redirect()->route('user.index');
    }

    public function showHistory()
    {
        $bets = Bet::where('user_id',Auth::id())->get();
        $data = [];
        $count = 0;
        foreach ($bets as $bet) {
            $match = $bet->match;
            $data[$count]['home_name'] = $match->home_name;
            $data[$count]['away_name'] = $match->away_name;
            $data[$count]['home_score'] = $match->home_score;
            $data[$count]['away_score'] = $match->away_score;
            $data[$count]['quantity'] = $bet->quantity;
            $data[$count]['bet_choice'] = $bet->bet_choice;
        }
        return view('user.bet.history');
    }
}
