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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::where('public', Match::HIDDEN_MATCH)->get();
        return view('admin.hidden.index')->with('matches',$matches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hidden.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'home_name' => 'required',
            'away_name' => 'required|different:home_name',
            'home_rate' => 'required',
            'away_rate' => 'required',
            'draw_rate' => 'required',
            'time_close_bet' => 'before:time_start|after:'.Carbon::now(),
            'time_start' => 'after:time_close_bet',
            'time_end' => 'after:time_start',
        ],
        [
            'home_name.required' => 'Home name must not empty',
            'away_name.required' => 'Away name must not empty',
            'home_rate.required' => 'Home rate must not empty',
            'draw_rate.required' => 'Draw rate must not empty',
            'away_rate.required' => 'Away rate must not empty',
        ]);
        if ($validator->fails()) {
            return redirect()->route('hidden.create')
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::find($id);
        return view('admin.hidden.edit')->with('match',$match);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $match = Match::find($id);
        
        $match->home_name = $request->home_name;
        $match->away_name = $request->away_name;
        $match->home_rate = $request->home_rate;
        $match->draw_rate = $request->draw_rate;
        $match->away_rate = $request->away_rate;
        $match->time_close_bet = $request->time_close_bet;
        $match->time_start = $request->time_start;
        $match->time_end = $request->time_end;

        $match->save();
        return redirect()->route('hidden.index');
    }

    /**
     * Remove the specified resource from storage.
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
