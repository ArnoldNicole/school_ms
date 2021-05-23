<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;
use App\pupil;

class appController extends Controller
{
    public function index()
    {
    	
    	
    	return view('app.home');
    }
}
