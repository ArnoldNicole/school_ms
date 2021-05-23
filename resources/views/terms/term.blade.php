@extends('layouts.app')

@section('additional-links')
 
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
 @endsection


@section('content')

<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row justify-content-center mt-5">
			<div class="col-md-6">
				<h3 class="detailed h3 text-center text-success font-weight-bold">TERM DETAILS</h3>
				<div class="card">
					<div class="card-body">
						<h4 class="h4 font-weight-bold text-info text-center p-1">HIGHLIGHTS</h4>
						<div class="text-center">Term Name :<span class="font-weight-bold text-danger">{{$term->termname}}</span></div>
						<div class="text-center">YEAR: <span class="font-weight-bold text-danger">{{$term->termyear}}</span></div>
						<h4 class="h4 font-weight-bold text-info text-center">DATES</h4>
						<div class="p-0 "><span class="font-weight-bold text-dark h4 p-0 d-md-inline">FROM: </span> <span class="font-weight-bold text-success h4 p-0 d-md-inline">{{ $term->startdate}}</span>
						<span class="font-weight-bold text-dark h4 p-0 d-md-inline">TO </span><span class="font-weight-bold text-success h4 p-0 d-md-inline"> {{ $term->enddate}}</span></div>
						<h4 class="h4 font-weight-bold text-info text-center">FEES</h4>
						<div class="text-center">FEES STATUS: <span class="font-weight-bold text-danger">{{$term->status}}</span></div>
						<div class="text-center">BILLED PUPILS: <span class="font-weight-bold text-danger">{{$term->pupil->count()}}</span></div>

						
					</div>
				</div>

			</div>
			<div class="col-md-6">
				<h3 class="detailed h3 text-center text-success font-weight-bold">EVENT  DETAILS</h3>
				<div class="card">
					<div class="card-body">
						@if($events->count()==0)
						<span class="alert alert-info w-100">No events found for this term</span>
						<a href="termdates" class="card-link">Create an event</a>
						@else
							<span class="alert alert-success">{{$events->count()}} Events scheduled for this term.</span>
						@endif
					</div>
				</div>
			</div>
		</div>

		

		<div class="row justify-content-center">
			<div class="col-md-12">
				<h4 class="detailed">BILLED PUPILS DETAILS</h4>
				<div class="card">
					<div class="bg-white">

						<table class="table bg-white table-bordered dt-responsive" id="example">
				  <thead>
				    <tr>
				    <th>FULL NAME</th> 
				    <th>ADM NO</th>
				    <th>GENDER</th> 
				    <th>UPI</th>
				    <th></th>
				    </tr>
				    <!--fullname admno upino classadmittedto gender status -->
				  </thead>
				  <tbody>
				    @foreach($term->pupil as $pupil)
				    <tr class="gradeX">
				      <td>{{$pupil->fullname}}</td>
				      <td>{{$pupil->registration_number}}</td>
				      <td>{{$pupil->gender}}</td>
				      <td>{{$pupil->upi_number}}</td>
				      <td><a href="/pupil/Detailed/{{$pupil->id}}" class="card-link">Got to pupil</a></td>				      
				    </tr>  
				    @endforeach
				                  
				  </tbody>
				</table>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')
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