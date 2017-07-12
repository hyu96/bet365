<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use Carbon\Carbon;
use Validator;

class HiddenMatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show all hidden matches.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::where('public', Match::HIDDEN_MATCH)->orderBy('time_start')->get();
        return view('admin.hidden.index')->with('matches', $matches);
    }

    /**
     * Show the form for creating a new match.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hidden.create');
    }

    /**
     * Store a newly created match in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'home_name' => 'required',
            'away_name' => 'required|different:home_name',
            'home_rate' => 'required|numeric|min:0',
            'away_rate' => 'required|numeric|min:0',
            'draw_rate' => 'required|numeric|min:0',
            'time_close_bet' => 'after:'.Carbon::now(),
            'time_start' => 'after:time_close_bet',
            'time_end' => 'after:time_start',
        ],
        [
            'home_name.required' => 'Home name must not empty',
            'away_name.required' => 'Away name must not empty',
            'home_rate.min' => 'Home rate must be a positive number',
            'draw_rate.min' => 'Draw rate must be a positive number',
            'away_rate.min' => 'Away rate must be a positive number',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $match = new Match();
            
            $match->home_name = $request->home_name;
            $match->away_name = $request->away_name;
            $match->home_rate = $request->home_rate;
            $match->draw_rate = $request->draw_rate;
            $match->away_rate = $request->away_rate;
            $match->time_close_bet = $request->time_close_bet;
            $match->time_start = $request->time_start;
            $match->time_end = $request->time_end;
            $match->done = Match::NOT_DONE;

            $match->save();
            return redirect()->route('hidden.index');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('admin.hidden.edit')->with('match', $match);
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
        $validator = Validator::make($request->all(), [
            'home_name' => 'required',
            'away_name' => 'required|different:home_name',
            'home_rate' => 'required|numeric|min:0',
            'away_rate' => 'required|numeric|min:0',
            'draw_rate' => 'required|numeric|min:0',
            'time_close_bet' => 'date|after:'.Carbon::now(),
            'time_start' => 'date|after:time_close_bet',
            'time_end' => 'date|after:time_start',
        ],
        [
            'home_name.required' => 'Home name must not empty',
            'away_name.required' => 'Away name must not empty',
            'home_rate.min' => 'Home rate must be a positive number',
            'draw_rate.min' => 'Draw rate must be a positive number',
            'away_rate.min' => 'Away rate must be a positive number',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $match = Match::find($id);
            
            $match->home_name = $request->home_name;
            $match->away_name = $request->away_name;
            $match->home_rate = $request->home_rate;
            $match->draw_rate = $request->draw_rate;
            $match->away_rate = $request->away_rate;
            $match->time_close_bet = $request->time_close_bet;
            $match->time_start = $request->time_start;
            $match->time_end = $request->time_end;
            $match->done = Match::NOT_DONE;

            $match->save();
            return redirect()->route('hidden.index');
        }   
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

        return redirect()->route('hidden.index');
    }

    public function publicMatch($id)
    {
        $match = Match::find($id);
        $match->public = Match::PUBLIC_MATCH;
        $match->save();

        return redirect()->route('public.index');
    }
}
