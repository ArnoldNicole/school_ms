<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pupil;

class suspensionController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function store(pupil $pupil)
    {
    	$data=request()->validate([
    		"registration_number" => ['required','exists:pupils','string'],
    	      "Father_email" => ['email'],
    	      "Father_contact" =>['string'], 
    	      "Mother_email" =>['email'], 
    	      "Mother_contact" => ['string'],
    	      "subject" => ['required','min:5'],
    	      "message" => ['required','min:15'],
    	  ]);
    	$suspensions=$pupil->suspensions()->count();
    	if ($suspensions>=3) {
    		return redirect('/home')->with('error','Pupil can`t be suspended again. Has been suspended three times already');
    	}

    	$pupil->suspensions()->create($data);
    	$pupil->update(['status'=>'Suspended']);
    	return redirect('/home')->with('success','Pupil has been suspended and parents emailed. Check the mailbox for deliveries and printing of Suspension Letter');
    }

    public function update()
    {
    	$data=request()->validate([
    		'id'=>['required']
    	]);
    	$pupil=pupil::find($data['id']);
    	if ($pupil->status!="Suspended") {
    		return redirect('/home')->with('error','selected pupil is not on Suspension');
    	}
    	$pupil->update(['status'=>'active']);
    	return redirect('/home')->with('success','Pupil has been re admitted back to class. Kindly advice them. Email has been sent to parents');
    }
}
