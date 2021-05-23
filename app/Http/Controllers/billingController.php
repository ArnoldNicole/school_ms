<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pupil;
use App\Term;

class billingController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(pupil $pupil)
    {
    	return ['Hey'.$pupil->fullname.'Billing Finder'];
    }

    public function bill(Term $term, pupil $pupil)
    {
    	//get the authenticated user
    	$user=auth()->user();
    	//get the billable class
    	foreach ($pupil->classes as $class) {
    	    $term_billable=$term->term_billable;
    	    if ($term_billable==1) {
    	         $expected=$class->classfees;
    	    }
    	    if ($term_billable==2) {
    	         $expected=$class->classfees2;
    	    }
    	    if ($term_billable==3) {
    	         $expected=$class->classfees3;
    	    }
    	   
    	}
		//create new billing
		   $pupil->payments()->create([
		            "fullname"=>$pupil->fullname,
		            "classname"=>'TERM_BILLING',
		            "registration_number"=>$pupil->registration_number,
		            "receipt_number"=>$term->termname.'-'.$pupil->id.'-BILLING',
		            "banking_agent"=>$term->termname.'-TERM_START',
		            "date_banked"=>$term->startdate,
		            "amount_Paid"=>0,
		            "date_of_payments"=>$term->startdate,
		            "name"=>$user->name,
		            "Newbalance"=>"NULL",
		            "Expected"=>$expected,
		]);

	//create relationship with the term
	  $term->pupil()->toggle($pupil);

   //return the pupil`s profile
	  return redirect('/pupil/Detailed/'.$pupil->id)->with('success','Pupil has been billed for the term');




    }
}
