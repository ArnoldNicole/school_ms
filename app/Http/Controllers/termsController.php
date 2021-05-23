<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DateTime;
use App\pupil;
use App\Term;
use App\Event;

class termsController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('auth');
    }

    public function index()
    {
        $terms=Term::orderBy('created_at','DESC')->get();
        return view('terms.index',compact('terms'));
    }
    public function new()
    {
    	return view('terms.new');
    }

    public function store(User $user)
    {
        $data=request()->validate([
      "termname" =>  ['string','required','unique:terms'], 
      "term_billable" => ['required'],
      "termyear" => ['required'],
      "startdate" => ['date','required','before:enddate'],
      "enddate" => ['string','required','after:startdate'],
  ]);
        

        //calculate the days
        
        $startDate = new DateTime($data['startdate']);
        $EndDate = new DateTime($data['enddate']);
        $difference = $EndDate->diff($startDate);
        $termLength = $difference->days;
        //dd($termLength);
        //find if pupil is young
        if ($termLength<50) {
          return redirect()->back()->with('error', 'Term minimum days is 50 days');
        }

        //bill all students
        $pupils=pupil::all();
        $expected='';
   

        //create new term after billing all the pupils
        $user->terms()->create($data);
        return redirect('/terms')->with('success','Term has been created Successfully and pupils billled for the term');

    }

    public function newTermDate()
    {
        $terms=Term::orderBy('created_at','DESC')->paginate(1);
        return view('terms.termdates',compact('terms'));
    }
    /*
        function to create a new event in a term
        each term can have many events
        Any day in a term can only have one event
        return a redirect to the created term
    */

    public function events(Term $term)
    {
        $data=request()->validate([
        "eventdate" => ['required','date','after:today','before:last_term_date','unique:events'],
        "today" => ['required'],
        "last_term_date"=>['date','required'],
        "description" => ['required','string']
    ]);
        $term->event()->create([
            'eventdate'=>$data['eventdate'],
            'description'=>$data['description']
        ]);
        return redirect('/listTermEvents/'.$term->id)->with('success','Event added successfully');
    }


    /*
        function to show new event in a term
        each term can have many events
        Any day in a term can only have one event
        return a redirect to the created term
    */
    public function calendar(Event $event)
    {
        return view('terms.dayEvent',compact('event'));
    }

    public function editEvent(Event $event)
    {
                return view('terms.event_editor',compact('event'));
    }

    public function update(Event $event)
    {
            $data=request()->validate([
            "eventdate" => ['required','date','after:today','before:last_term_date','unique:events,eventdate,'.$event->id.',id'],            
            "today" => ['required',],
            "last_term_date"=>['date','required'],
            "description" => ['required','string']
        ]);
            // $date=new DateTime($data['today']);
            // dd($date->y);
        $event->update([
            'eventdate'=>$data['eventdate'],
            'description'=>$data['description']
        ]);
          return redirect('/listTermEvents/'.$event->term->id)->with('success','Event updated successfully');
    }

    public function show()
    {
        $terms=Term::orderBy('created_at','DESC')->get();
        //dd($terms);
        return view('terms.all',compact('terms'));
    }

    public function billAllPupils(Term $term)
    { 
        if ($term->status=="Billed") {
            return redirect()->back()->with('error','Term Appears to be already billed for students');
        }
        $user=auth()->user();
        $pupils=pupil::all();
        if ($pupils->count()==0) {
            return redirect()->back()->with('error','No pupils to bill');
        }
           foreach ($pupils as $pupil) {
        
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
        $term->pupil()->toggle($pupil);
        }
        $term->status="Billed";
        $term->save();

        return redirect('/termDetails/'.$term->id);
    }


    public function showIndividualTerm(Term $term)
    {
      $events=Event::where('term_id',$term->id)->get();
     // $billedPupils=$term->pupil;
     
       return view('terms.term',compact('events','term'));
    }


}
