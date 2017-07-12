<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Match;
use App\Models\Bet;
use App\User;
use Carbon\Carbon;
use Validator;

class UserController extends Controller
{
    // show all matches user can bet
    public function index()
    {
        $matches = Match::where('public', Match::PUBLIC_MATCH)
            ->where('done' ,Match::NOT_DONE)
            ->where('time_close_bet', '>', Carbon::now())
            ->orderBy('time_start')
            ->get();
        return view('user.bet')->with('matches', $matches);
    }

    // show match detail and bet form
    public function show($id)
    {
        $match = Match::find($id);
        $home_number = Bet::where('match_id', $id)->where('bet_choice', Match::HOME)->count();
        $draw_number = Bet::where('match_id', $id)->where('bet_choice', Match::DRAW)->count();
        $away_number = Bet::where('match_id', $id)->where('bet_choice', Match::AWAY)->count();
        return view('user.bet_detail',[
            'match' => $match,
            'home_number' => $home_number,
            'draw_number' => $draw_number,
            'away_number' => $away_number
        ]);
    }

    // store user's bet information in database
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $validator = Validator::make($request->all(), [
            'bet_money' => 'required|numeric|max:'.$user->acc_money,
        ],
        [
            'bet_money.max' => 'You dont have enough money'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $user->acc_money = $user->acc_money - $request->bet_money;
            $user->save();
            $match = Match::find($request->match_id);

            $bet = new Bet();

            $bet->user_id = $request->user_id;
            $bet->match_id = $request->match_id;
            $bet->bet_choice = $request->bet_choice;
            $bet->quantity = $request->bet_money;
            if ($request->bet_choice == Match::HOME_WIN) {
                $bet->rate = $match->home_rate;
            } else if ($request->bet_choice == Match::DRAW_WIN) {
                $bet->rate = $match->draw_rate;
            } else {
                $bet->rate = $match->away_rate;
            }
            $bet->profit = 0;

            $bet->save();
        }
        return redirect()->route('user.index');
    }

    // show user's bet history
    public function showHistory()
    {
        $bets = Bet::where('user_id', Auth::id())->with('match')->get();
        return view('user.history')->with('bets', $bets);
    }
}
