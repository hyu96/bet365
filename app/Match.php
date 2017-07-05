<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	protected $table = 'matches';

	public function bet()
	{
		return $this->hasMany('App\Bet');
	}
}
