@extends('layouts.app')
@section('additional-links')
 
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
 @endsection
@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<h3 class="h3 font-weight-bold text-primary">EXAM DETAILS</h3>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<p class="text-success font-weight-bold">Exam Name: <span class="text-primary font-weight-bold">{{$exam->Exam}}</span> </p>
				<p class="text-success font-weight-bold">Exam ID:  <span class="text-primary font-weight-bold">{{$exam->id}}</span> </p>
				<p class="text-success font-weight-bold">Exam Term: <span class="text-primary font-weight-bold">{{$exam->term}}</span> </p>
				<p class="text-success font-weight-bold">Exam Year: <span class="text-primary font-weight-bold">{{$exam->year}}</span> </p>
			</div>
			<div class="col-md-4">
				<h4 class="font-weight-bold text-dark">EXAM CLASS DETAILS</h4>
				<p>Class Name: {{$exam->classes->classname}} <span></span> </p>
				<p>Number Of Pupils: <span>{{$marks->count()}}</span> </p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered dt-responsive" id="example">
				  <thead>
				    <tr>
				    	<th></th>
				      <th>Full Names</th>
				      <th>Maths</th>
				      <th>English</th>
				      <th>Kiswa</th>
				      <th>ScieAgriHsce</th>
				      <th>ArtMusicPhe</th>
				      <th>ssre</th>
				      <th>Total</th>
				      <th>Admission number</th>
				      <th></th>
				    </tr>
				   </thead>
				  <tbody>
				    @foreach($marks as $mark)
				    @if($mark->pupil!=null)
				    <tr class="gradeX">
				    	<td></td>
				      <td>{{$mark->pupil->fullname}}</td>				      
				      <td>{{$mark->maths }}</td>
				      <td>{{$mark->english }}</td>
				      <td>{{$mark->kiswa }}</td>
				      <td>{{$mark->ScieAgriHsce }}</td>
				      <td>{{$mark->ArtMusicPhe }}</td>                        
				      <td>{{$mark->ssre }}</td>
				      <td>{{$mark->Total}}</td>
				      <td>{{$mark->pupil->registration_number}}</td>
				      <td></td>
				    </tr> 
				    @endif
				    @endforeach 
				                   
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection


 @section('scripts')
 <script src="{{asset('js/jquery3.1.js')}}"></script>
 <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
 <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('js/responsive.bootstrap4.min.js')}}"></script>

 <script>
 $(document).ready(function(){
  $('#example').DataTable();
 });
</script>
 @endsection