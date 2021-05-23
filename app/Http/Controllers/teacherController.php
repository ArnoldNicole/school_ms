<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class teacherController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function edit()
    {
    	return view('teacher.edit');
    }

    public function store(Request $request)
    {
    	
    	$data=$request->validate([
    		"teacherid" =>['required','unique:teachers'] ,
    		"teachername" =>['required','string','max:100'] ,
    		"dateadmitted" =>['required','date'] ,
    		"nationalid" => ['required','unique:teachers'],
    		"tscno" => ['required','unique:teachers'],
    		"subject1" =>['string'] ,
    		"subject2" => ['string'],
    	]);
    	Teacher::create($data);
    	return redirect('/home')->with('success','Teacher added successfully.');

    	
    }
    public function show()
    {
    	$teachers=Teacher::orderBy('created_at','desc')->get();
    	return view('teacher.show',compact('teachers'));
    }
    public function action()
    {
        $teachers=Teacher::orderBy('created_at','desc')->get();
        return view('teacher.select',compact('teachers'));
    }
    public function update_fetch()
    {
        $data=request()->validate([
            'id'=>['required','exists:teachers']
        ]);
        $tutor=Teacher::find($data['id']);
        $teachers=Teacher::orderBy('created_at','desc')->get();
        return view('teacher.editor',compact('teachers', 'tutor'));
    }

    public function update(Teacher $teacher)
    {
        $data=request()->validate([
            "teacherid" =>['required'] ,
            "teachername" =>['required','string','max:100'] ,
            "dateadmitted" =>['required','date'] ,
            "nationalid" => ['required'],
            "tscno" => ['required'],
            "subject1" =>['string'] ,
            "subject2" => ['string'],
        ]);
        $teacher->update($data);
        return redirect('/home')->with('success','Teacher has been updated successfully.');
    }

}
