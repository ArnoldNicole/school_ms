<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;

class classesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	return view('classes.new');
    }

    public function store()
    {
    	$data=request()->validate([
    			"classname" => ['required','string','unique:classes'],
    		      "classyear" => ['required','numeric'],
    		      "classdate" => ['required','date'],
    		      "classfees" => ['required'],
    		      "classfees2" => ['required'],
    		      "classfees3" => ['required']
    	]);
    	Classes::create($data);
    	return redirect('/')->with('success','Class Added Successfully');
    }

    public function show(){
    	$classes=Classes::orderBy('created_at','desc')->paginate(25);
    	return view('classes.show', compact('classes'));
    }

    public function edit(Classes $class)
    {
        // dd($class);
        return view('classes.class',compact('class'));
    }

    public function update(Classes $class)
    {
       $data=request()->validate([
                "classname" => ['required','string','unique:classes'],
                  "classyear" => ['required','numeric'],
                  "classdate" => ['required','date'],
                  "classfees" => ['required'],
                  "classfees2" => ['required'],
                  "classfees3" => ['required']
        ]);
        $class->update($data);
        return redirect('/home')->with('success', 'class updated successfully') ;
    }
}
