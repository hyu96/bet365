<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $table = 'bets';

    public function user()
    {
    	return $this->belongTo('App\User');
    }

    public function match()
    {
    	return $this->belongTo('App\Match');
    }
}
