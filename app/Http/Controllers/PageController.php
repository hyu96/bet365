<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
    	return redirect('/betting');
    }

    public function index()
    {
    	return redirect('/admin/matches/hidden');
    }
}
