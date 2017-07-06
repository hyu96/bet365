<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Match;

class Bet extends Model
{
    protected $table = 'bets';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function match()
    {
    	return $this->belongsTo('App\Match');
    }
}
