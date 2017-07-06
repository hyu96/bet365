<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	protected $table = 'matches';

	const PUBLIC_MATCH  = 1;
	const PRIVATE_MATCH = 0;

	const DONE = 1;
	const NOT_DONE = 0;

	const HOME = 1;
	const DRAW = 0;
	const AWAY = -1;

	public function bet()
	{
		return $this->hasMany('App\Bet');
	}
}
