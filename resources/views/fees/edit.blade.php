@extends('layouts.app')
@section('content')
<div class="wrapper container-fluid">
	
	<div class="row justify-content-center">
		<div class="card">
			<div class="card-body">
				<h3 class="h3 font-weight-bold">Payments Instructions</h3>
				<p><ul>
					<li>Following a bug in the teacher module, the payments of fees will be triggered from the pupil profile. To go to a pupil`s profile,
					<ol>
						<li>Search their name <a href="/views">Here</a></li>
						<li>Click the <kbd>profile</kbd> button of the desired pupil</li>
						<li>on the profile click the red <button class="btn btn-outline-danger">Pay Fees</button> button. </li>

					</ol> </li>
				</ul></p>
			</div>
		</div>
	</div>

	{{-- <h4 class="title">Record payment details here.</h4>
	<a id="see" href="payfee.php" style="display: none;"><button class="btn btn-theme04" type="button" >Record another</button></a>
	    <form action="/payfees" method="POST" id="myform">
	    	@csrf
	    	<div class="row justify-content-center">
	    		<div class="col-md-1">
	    			<span class="btn btn-block font-weight-bold text-dark">Search</span>
	    		</div>
	    		<div class="col-md-8">
	    			      <div class="form-group">
	    			       <input type="text" name="registration_number" class="form-control @error('registration_number') is-invalid @enderror">
	    			       @error('registration_number')
	    						<span class="btn btn-block btn-outline-danger alert alert-danger">{{$message}}</span>
	    			       @enderror
	    			       
	    			        
	    			      </div>
	    		</div>
	    		<div class="col-md-3">
	    			<button class="btn btn-block btn-theme04" type="submit">Populate</button>
	    		</div>
	    	</div>
	      
	    </form>
	             --}}





</div>
@endsection