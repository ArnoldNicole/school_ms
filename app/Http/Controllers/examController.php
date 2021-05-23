<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Imports\ExamsImport;
use App\Imports\MarksImport;
use Excel;
use DB;
use App\Classes;
use App\pupil;
use App\Mark;
use App\Exam;
class examController extends Controller
{
  public function __construct()
  {
  	$this->middleware('auth');
  }

  public function index()
  {
  	return view('exams.index');
  }
  public function show()
  {
    $classes=Classes::orderBy('created_at','DESC')->get();
  	return view('exams.show', compact('classes'));
  }

  public function store(Request $request, User $user)
  {
  	$this->validate($request, [
  		'ExamMarklist'=>['required','mimes:xls,xlsx'],
  		'ExamCode'=>['required'],
  		'TeacherCode'=>['required'],
  	]);
  	$path=$request->file('ExamMarklist')->getRealPath();
  	$saveExam=Excel::import(new ExamsImport, $path);
    $saveMarks=Excel::import(new MarksImport, $path);
    return redirect('/home')->with('success', "Marklist Uploaded Successfully");  	
  }

  public function getpupils(Request $request)
  {
    if($request->ajax()) {
    $data=request()->validate([
      'class'=>['required'],
    ]);
    $class=Classes::findorfail($data['class']);
  $output = '';
  // if searched pupil count is larager than zero
  if ($class->pupils->count()>0) { 
      foreach ($class->pupils as $pupil){
          // concatenate output to the array
          $output .= '<option value='.$pupil->id.'>'.$pupil->fullname.'</option>';
      }     
      
  }
  else {
      
      $output .= '<option>Class has 0 pupils</option>';
  }

  return $output;
  }
}

 public function getpupilexams (Request $request)
 {
    if($request->ajax()) {
    $data=request()->validate([
      'pupil'=>['required'],
    ]);
    $pupil=pupil::findorfail($data['pupil']);
  $output = '';
  // if searched pupil count is larager than zero
  if ($pupil->marks->count()>0) { 
      foreach ($pupil->marks as $mark){
          // concatenate output to the array
          $output .= '<option value='.$mark->id.'>'.$mark->exam->Exam.'</option>';
      }     
      
  }
  else {
      
      $output .= '<option>pupil has 0 exam marks</option>';
  }

  return $output;
  }
}

public function getMarks(Request $request){
//dd($request);
$data=request()->validate([
  'class' =>['required'],
        'pupil' =>['required'],
        'exam' =>['required'],
]);
$mark=Mark::findorfail($data['exam']);
//dd($mark);
return view('exams.marks', compact('mark'));
}

public function findExamResults(Request $request)
{
  if($request->ajax()) {
    $data=request()->validate([
      'selectedClass'=>['required'],
    ]);
    $class=Classes::findorfail($data['selectedClass']);

  $output = '';
  // if searched pupil count is larager than zero
  if ($class->exams->count()>0) { 
      foreach ($class->exams as $exam){
          // concatenate output to the array
          $output .= '<option value="'.$exam->id.'">'.$exam->Exam.'</option>';
      }     
      
  }
  else {
      
      $output .= '<option>Class has 0 Exam marks</option>';
  }

  return $output;
  }
}

public function loadExamResults()
{
  $data=request()->validate([
  'classesMarklis'=>['required'],
  'FoundexamLists'=>['required'],
]);
  $exam=Exam::findorfail($data['FoundexamLists']);
  $class=Classes::findorfail($data['classesMarklis']);
  $marks=$exam->marks;
  //dd($marks);

  return view('exams.table',compact('exam','class','marks'));
}

}
