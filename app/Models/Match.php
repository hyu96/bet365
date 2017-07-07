<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bet;

class Match extends Model
{
	protected $table = 'matches';

	const PUBLIC_MATCH  = 1;
	const HIDDEN_MATCH = 0;

	const DONE = 1;
	const NOT_DONE = 0;

	const HOME = 1;
	const DRAW = 0;
	const AWAY = -1;

	const HOME_WIN = 1;
	const DRAW_WIN = 0;
	const AWAY_WIN = -1;

	public function bet()
	{
		return $this->hasMany('App\Models\Bet');
	}
}
