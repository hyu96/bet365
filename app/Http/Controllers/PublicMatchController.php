<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use App\Models\Bet;
use Carbon\Carbon;
use Validator;

class PublicMatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of all public matches.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::where('public', Match::PUBLIC_MATCH)->orderBy('time_start')->get();
        return view('admin.public.index')->with('matches', $matches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified match detail and number of users have bet that match.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $match = Match::find($id);
        $home_number = Bet::where('match_id', $id)->where('bet_choice', Match::HOME)->count();
        $draw_number = Bet::where('match_id', $id)->where('bet_choice', Match::DRAW)->count();
        $away_number = Bet::where('match_id', $id)->where('bet_choice', Match::AWAY)->count();
        $bets = Bet::where('match_id', $id)->with('user')->get();
        return view('admin.public.detail', [
            'match' => $match,
            'bets' => $bets,
            'home_number' => $home_number,
            'draw_number' => $draw_number,
            'away_number' => $away_number
        ]);
    }

    /**
     * Show the form for editing the specified match.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::find($id);
        return view('admin.public.update', ['match' => $match]);
    }

    /**
     * Update the specified match in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $match = Match::find($id);
        $match->home_score = $request->home_score;
        $match->away_score = $request->away_score;
        $match->done = Match::DONE;
        if ($match->home_score > $match->away_score) {
            $match->result = Match::HOME_WIN;
        } else if ($match->home_score < $match->away_score) {
            $match->result = Match::AWAY_WIN;
        } else {
            $match->result = Match::DRAW_WIN;
        }

        $bets = Bet::where('match_id',$id)->get();
        foreach ($bets as $bet) {
            $user = $bet->user;
            if ($bet->bet_choice != $match->result) {
                $bet->profit = 0 - $bet->quantity;
                $user->acc_money -= $bet->profit; 
            } else {
                $bet->profit = ceil($bet->quantity * $bet->rate);
                $user->acc_money += $bet->profit;
            }
            $user->save();
            $bet->save();
        }

        $match->save();
        return redirect()->route('public.index');
    }

    /**
     * Remove the specified match from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Match::find($id);
        $match->delete();

        return redirect()->route('public.index');
    }
}
