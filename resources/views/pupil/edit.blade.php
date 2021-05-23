@extends('layouts.app')
@section('content')
<div class="container-fluid ml-4">
	<div class="row justify-content-center">
		<div class="col-md-8 well">
			      <form action="/pupil/editpupil/save/{{$pupil->id}}" method="post" class="detailed">
			      	@csrf
			      	@method('PATCH')
			        <h4>Editable Pupil Details</h4>
			        <div class="form-group">
			          <label>Pupil full names</label>
			          <div class="input-group">	           
			          <input class="form-control" type="text" name="fullname" value="{{$pupil->fullname}}" required>                     
			          </div>
			          
			        </div>
			         <div class="form-group">
			          <label>Admission number</label>
			          <div class="input-group">
			          
			          <input type="number"  class="form-control" type="text" name="registration_number" value="{{$pupil->registration_number}}" readonly>                     
			          </div>
			          
			        </div>
			        <div class="form-group">
			          <label>UPI Number</label>
			          <div class="input-group">
			          
			          <input class="form-control" type="text" name="upi_number" value="{{$pupil->upi_number}}" required>                     
			          </div>
			          
			        </div>
			        <div class="form-group">
			          <label>Birth Certificate Number</label>
			          <div class="input-group">
			         
			          <input class="form-control" type="text" name="birth_certificate_number" value="{{$pupil->birth_certificate_number}}" required>                     
			          </div>                        
			        </div> 

			        <div class="form-group">
			          <label>Date of Birth</label>
			          <div class="input-group">
			              
			          <input class="form-control" type="date" name="date_of_birth" value="{{$pupil->date_of_birth}}" required>                     
			          </div>                        
			        </div>

			    <div class="form-group ">
			  <label>Select gender</label><br>
			  <div class="radio-inline">
			    <label>
			    <input type="radio" name="gender"  value="Male">
			    Male
			    </label>
			  </div>
			  <div class="radio-inline">
			    <label>
			    <input type="radio" name="gender" value="Female" >
			    Female
			    </label>
			  </div>
			  <div class="radio-inline">
			    <label>
			    <input type="radio" name="gender"  value="Other" checked>
			    Other
			    </label>
			  </div>
			</div>
			<div>
			          <button class="btn btn-default" type="submit" name="update">Update details</button>
			        </div>
		</div>
	</div>
	     
	</form>

</div>
@endsection