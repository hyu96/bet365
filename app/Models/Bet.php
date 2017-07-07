<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Match;
use App\User;

class Bet extends Model
{
    protected $table = 'bets';

    const HOME = 1;
    const DRAW = 0;
    const AWAY = -1;

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function match()
    {
    	return $this->belongsTo('App\Models\Match');
    }
}
