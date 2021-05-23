<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pupil;
use DateTime;
use App\pupil_Subjects;
use App\Parents;
use App\Classes;
use App\Term;
use Intervention\Image\Facades\Image;
class pupilController extends Controller
{
    public function addClass()
    {
        $classes =Classes::orderBy('created_at','DESC')->get();
        return $classes;
    }
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function index(){
    	$newPupil='';       
        $classes =Classes::orderBy('created_at','DESC')->get();
        if ($classes->count()==0) {
            return redirect('/home')->with('error','To add a pupil at lesat one class should be existing.Please add a class');
        }
        return view('pupil.new', compact('newPupil','classes'));
    }
    public function store(){
    $response="";
    $data=request()->validate([
    	     "pupilfullname" =>['required','string'],
    	     "pupiladdress" =>['required','string'],
    	     "registration_number" => ['required','string','unique:pupils'],
    	     "upi_number" => ['required','string','unique:pupils'],
    	     "birth_certificate_number" => ['required','string','unique:pupils'],
    	     "date_of_admission" => ['required','date'],
    	     "date_of_birth" => ['required','date','before:date_of_admission'],
    	    
    ]);
    //calculate age
    $userDob = $data['date_of_birth'];
    $dob = new DateTime($userDob);
    $now = new DateTime();
    $difference = $now->diff($dob);
    $age = $difference->y;
    //find if pupil is young
    if ($age<4) {
      return redirect()->back()->with('error', 'Pupils less than 4 years cant be registered');
    }
    $newPupil = pupil::create([
    	'fullname'=>$data['pupilfullname'],
    	'address'=>$data['pupiladdress'],
    	'registration_number'=>$data['registration_number'],
    	'upi_number'=>$data['upi_number'],
    	'birth_certificate_number'=>$data['birth_certificate_number'],
    	'date_of_admission'=>$data['date_of_admission'],
    	'date_of_birth'=>$data['date_of_birth']
    ]);
     $classes =Classes::orderBy('created_at','DESC')->get();
     $response="Proceed to Subjects section";

    return view('pupil.new', compact('newPupil','classes','response'))->with('success', 'Proceed to section two');
}

	public function subjects(pupil $pupil){
		$data=request()->validate([
				  "English" =>['string','required'],
			      "Kiswahili" =>['string','required'],
			      "Maths" =>['string','required'],
			      "SocialStudies" => ['string','required'],
			      "Science" => ['string','required'],
			      "ReligiousEducation" =>['string','required'],
			      "optional" =>['string','required'],
			     
		]);
		$pupil->pupil_subject()->create($data);
		$newPupil=$pupil;
        $classes =Classes::orderBy('created_at','DESC')->get();
        $response="Proceed to Finance section ";        
		return view('pupil.new',compact('newPupil','classes','response'))->with('success', 'Hurray', 'Go to last Step');
	}

    public function show()
    {
        $pupils=pupil::orderBy('created_at','DESC')->paginate(30);
        return view('pupil.show', compact('pupils'));
    }

    public function show_subjects()
    {
        $pupils=pupil_Subjects::orderBy('created_at','DESC')->paginate(30);
        return view('pupil.show_subjects', compact('pupils'));
    }
    public function edit(pupil $pupil){
        return view('pupil.edit', compact('pupil'));
    }
    public function update(pupil $pupil)
    {
        $data=request()->validate([
        "fullname" => ['required'],
        "registration_number" => ['required'],
        "upi_number" => ['required'],
        "birth_certificate_number" => ['required'],
        "date_of_birth" => ['required'],
        "gender" => ['required'],
        ]);
        //dd($data);
        $pupil->update($data);
        return redirect('/home')->with('success','Pupil details updated successfully');
        
    }

    public function getparent(pupil $pupil)
    {
        $fathers=Parents::orderBy('created_at','Desc')->where('parent_type','Father')->get();
        $guardians=Parents::orderBy('created_at','Desc')->where('parent_type','Guardians')->get();
        $mothers=Parents::orderBy('created_at','Desc')->where('parent_type','Mother')->get();

        //show the parents
        $parents=$pupil->parents;
        //dd($parents);
        return view('pupil.parents', compact('pupil','fathers','mothers','guardians','parents'));
    }

    public function postparent(pupil $pupil)
    {
        $data=request()->validate([
            'father'=>['string'],
            'mother'=>['string'],
            'guardian'=>['string']
        ]);

        $father=Parents::find($data['father']);
        $mother=Parents::find($data['mother']);
        $guardian=Parents::find($data['guardian']);
        $pupil->parents()->toggle($father);
        $pupil->parents()->toggle($mother);
        $pupil->parents()->toggle($guardian);

        return redirect('/pupil/Detailed/'.$pupil->id)->with('success','Parents Updated Successfully');
    }

    public function SuspensionForm()
    { 
        
        $pupils=pupil::where('status','active')->get();
        $suspendedPupils=pupil::where('status','Suspended')->get();;
        $parents=[''];
        return view('pupil.suspends',compact('pupils','parents','suspendedPupils'));
    }

    public function SuspensionFormFill()
    {         
        $pupils=pupil::where('status','active')->get();
        $data=request()->validate([

            'id'=>['required']
        ]);
        $student=pupil::find($data['id']);
        if ($student->status!="active") {
            return redirect()->back()->with('error','Selected pupil is not active');
        }
        //get the fathers email
        $parents=$student->parents;              
        return view('pupil.suspend',compact('pupils','student','parents'));
    }

    public function finish(pupil $pupil)
    {
        $data=request()->validate([
            'gender'=>['string','required'],
            'admfees'=>['string','required'],
            'class'=>['string','required']
        ]);
        $pupil->update([
            'gender'=>$data['gender'],
            'admissionFees'=>$data['admfees'] 
    ]);
        $classes=Classes::find($data['class']);
        $pupil->classes()->toggle($classes);
        $pupil->balance()->create(['balance'=>0]);


        return redirect('/pupil/Detailed/'.$pupil->id)->with('success', 'Completed registration Successfully');

    }

    public function info(pupil $pupil)
    {
        $parents=$pupil->parents;
        $classes=$pupil->classes;
        $subjects=$pupil->pupil_subject;
        $terms=Term::where('status','Billed')->get(); 
        return view('pupil.profile', compact('terms','pupil','parents','classes','subjects'));

    }

    public function search(Request $request)
    {
        // check if ajax request is coming or not
        if($request->ajax()) {
            // select title name from database
            $data = pupil::where('fullname','LIKE',$request->pupil.'%')->get();
            // declare an empty array for output
            $output = '';
            // if searched pupil count is larager than zero
            if (count($data)>0) {
                // concatenate output to the array
                $output = '               
                <h3 class="h3 text-info font-weight-bold text-center mt-1 mb-3">Found Pupils...</h3>
                <ul class="list-group mt-1" style="display: block; position: relative; z-index: 1">
                ';

                // loop through the result array
                foreach ($data as $row){
                    // concatenate output to the array
                    $output .= '<li class="list-group-item"><a href="/pupil/Detailed/'.$row->id.'">'.$row->fullname.'-'.$row->registration_number.'</a></li>';
                }
                // end of output
                $output .= '</ul>';
            }
            else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item mt-3">'.'<span class="text-danger">No pupil Available with that data <a href="/pupil/views">View All Pupils</a></span>'.'</li>';
            }
            // return output result array
           //dd($output);
            return $output;
        }
    }

    public function AddPassportSizedPhoto()
    {
        return view('pupil.passportupload');
    }
    public function AddPassportSizedPhotoLoad(pupil $pupil)
    {
        return view('pupil.passportupload',compact('pupil'));
    }

    public function SavePassportSizedPhoto()
    {
        $data=request()->validate([
            'registration_number'=>['required','exists:pupils'],
            'photo'=>['required', ['image']],
        ]);
        $imagePath = request('photo')->store('passports', 'public');
        $image=Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();

        //find the pupil id
        $pupil=pupil::where('registration_number', $data['registration_number'])->first();
        //check if pupil has profile
        if ($pupil->passport==null) {
            # create a new profile..
            $pupil->passport()->create([
            'photo'=>$imagePath,
        ]);
        }else{
            $previousPath=$pupil->passport->photo;
            unlink(public_path("storage/{$previousPath}"));
            $pupil->passport->photo=$imagePath;
            $pupil->passport->save();
        }
       
       return redirect('/pupil/Detailed/'.$pupil->id)->with('success','Pupil Passport Added/Edited Successfully');



    }
}
