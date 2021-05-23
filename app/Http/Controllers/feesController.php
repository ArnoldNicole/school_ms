<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pupil;
use App\Payment;

class feesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	return;
    }

   public function edit()
   {
   	return view('fees.edit');
   }

   public function search(pupil $pupil)
   {
   	   	return view('fees.loaded',compact('pupil'));
   }

  public function store(pupil $pupil)
   {
   	$data=request()->validate([
   				"fullname" => ['string','required','exists:pupils','min:4'],
   			    "classname" => ['string','required','exists:classes'],
   			    "registration_number" => ['string','required','exists:pupils'],
   			    "receipt_number" => ['string','unique:payments','required'],
   			    "banking_agent" => ['string','required'],
   			    "date_banked" => ['date','required','before:date_of_payments'],
   			    "amount_Paid" => ['string','required'],
   			    "date_of_payments" => ['date','required','after:date_banked'],
   			    "name" => ['required','exists:users'],
   			    "required" => ['string','required'],
   	]);
   	//dd($data);
   	//get the fees required
   	$expected=0;
   	// foreach ($pupil->classes as $class) {
   		
   	// 	$expected=$class->classfees+$class->classfees2+$class->classfees3;
   	// }
   	
   	$previousBalance=$pupil->balance->balance;
   	$newBalance=($expected+$previousBalance)-($data['amount_Paid']);
   	//make payments
   	$pupil->payments()->create([
   		"fullname"=>$data['fullname'],
   		"classname"=>$data['classname'],
   		"registration_number"=>$data['registration_number'],
   		"receipt_number"=>$data['receipt_number'],
   		"banking_agent"=>$data['banking_agent'],
   		"date_banked"=>$data['date_banked'],
   		"amount_Paid"=>$data['amount_Paid'],
   		"date_of_payments"=>$data['date_of_payments'],
   		"name"=>$data['name'],
   		"Newbalance"=>$newBalance,
	    "Expected"=>$expected,
   	]);
   	//update pupil payments
    //find a new Balance= 
    $newBalance=$pupil->payments->sum('Expected')-$pupil->payments->sum('amount_Paid');
   	$pupil->balance->update(['balance'=>$newBalance]);

   	return redirect('/pupil/Detailed/'.$pupil->id)->with('success','Fees Paid Successfully');   	

   }

   public function slip(Payment $transaction)
   {
      return view('fees.slip',compact('transaction'));
   }
}
