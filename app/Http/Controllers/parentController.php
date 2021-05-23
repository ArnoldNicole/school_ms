<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Parents;
use App\pupil;

class parentController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {

    }
    public function new()
    {
    	$fathers=Parents::orderBy('created_at','Desc')->where('parent_type','Father')->get();
    	$guardians=Parents::orderBy('created_at','Desc')->where('parent_type','Guardians')->get();
    	$mothers=Parents::orderBy('created_at','Desc')->where('parent_type','Mother')->get();
    	$pupils=pupil::all();
    	return view('parents.new',compact('fathers','mothers','guardians','pupils'));
    }

    public function store()
    {
    	$data=request()->validate([
    		'parent_fullname'=>['required'],
    		'nationalidno'=>['required','unique:parents'],
    		'phone1'=>['required','unique:parents'],
    		'phone2'=>['required','unique:parents'],
    		'location'=>['required'],
    		'email'=>['required','unique:parents'],
    		'parent_type'=>['required'],
    	]);
    	//dd($data);
    	$save=Parents::create($data);
    	return redirect('/home')->with('success','Parent Added Successfully');

    }
    public function show()
    {
        $parents=Parents::orderBy('created_at','DESC')->paginate(5);
        return view('parents.all', compact('parents'));
    }

    public function showall()
    {
        $parents=Parents::orderBy('created_at','DESC')->get();
        return view('parents.table', compact('parents'));
    }
}
