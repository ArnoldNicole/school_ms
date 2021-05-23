@extends('layouts.app')

@section('content')
<div class="row justify-content-center bg-white">
	<div class="col-md-12">
		<div class="container">
		    <div class="row">
		    	<div class="col-3">
		    		<div class="col-3 p-5">
		    		    <img src="/storage/{{$mark->pupil->passport->photo ?? ''}}" class="rounded-circle w-100"  alt="Pupil Photo">
		    		</div>
		    	</div>   
		        <div class="col-9 pt-5">
		          <div class="d-flex justify-content-between align-items-baseline">
		        <div class="d-flex align-items-center pb-3">
		            <div class="h4">{{$mark->pupil->fullname}}</div>   
		           <a href="/pupil/Detailed/{{$mark->pupil->id}}" class="btn btn-primary ml-3">Pupil Profile</a>         
		        </div>         
		           
		             <a href="/exams/ViewExamRecords" class="ml-5 btn btn-info">Back</a> 
		               <a href="/" class="ml-5 btn btn-info">Home</a>                
		            </div> 
		            
		            
		            
		        <div class="d-flex">
		            <div class="pr-5"><strong>{{$mark->pupil->marks->count()}}</strong> Total Exams</div>
		            <div class="pr-5"><strong>{{$mark->pupil->term->count()}}</strong> Terms</div>
		            <div class="pr-5"><strong>{{$mark->pupil->suspensions->count()}}</strong> Suspensions</div>
		        </div>  
		        <div class="pt-4 font-weight-bold">Pupil Name : {{$mark->pupil->fullname}}</div>
		        <div class="pt-2 font-weight-bold">Pupil Class : {{$mark->pupil->classes->first()->classname}}</div> 
		        <div class="pt-2 font-weight-bold">D.O.B : {{$mark->pupil->date_of_birth}}</div>
		    </div>
		</div>
		<div class="row pt-5">
		
		<div class="col-10 pb-4">
		  
   <p class="font-weight-bold text-dark"> Maths : <span class="text-success"> {{$mark->maths}}</span></p>
    <p class="font-weight-bold text-dark"> English : <span class="text-success">{{$mark->english}}</span></p>
   <p class="font-weight-bold text-dark"> Kiswahili <span class="text-success"> {{$mark->kiswa}}</span></p>
    <p class="font-weight-bold text-dark"> SCIE / AGRI / HSCE <span class="text-success">{{$mark->ScieAgriHsce}}</span></p>
   <p class="font-weight-bold text-dark"> Art / Music / Phe <span class="text-success"> {{$mark->ArtMusicPhe}}</span></p>
    <p class="font-weight-bold text-dark"> SSRE <span class="text-success">{{$mark->ssre}}</span></p>
    <p class="font-weight-bold text-dark"> Total Marks <span class="text-success">{{$mark->Total}} </span></p>
		</div>
		
		  
		</div>
		</div>
	</div>
</div>
@endsection