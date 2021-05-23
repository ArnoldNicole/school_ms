@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="well">
				New Parent
			</div>

			<form action="/parents/newParent/Save" method="POST">
			  <div class="form-group">
			  	@csrf
			    <label>Parents Fullname</label>
			    <div class="input-group">                  
			      <span class="input-group-addon"><i class="fa fa-edit"></i></span>
			      <input type="text" class="form-control" name="parent_fullname" minlength="3" autocomplete="off" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label>National ID</label>
			    <div class="input-group">                  
			      <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
			      <input type="number" class="form-control" name="nationalidno" minlength="7" maxlength="12" autocomplete="off" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label>Primary Phone</label>
			    <div class="input-group">                  
			      <span class="input-group-addon">+254</span>
			      <input type="number" class="form-control" name="phone1" minlength="9" min="700000000" max="799999999" autocomplete="off" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label>Secondary Phone</label>
			    <div class="input-group">                  
			      <span class="input-group-addon">+254</span>
			      <input type="number" class="form-control" name="phone2" minlength="9" min="700000000" max="799999999" autocomplete="off" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label>Physical Address</label>
			    <div class="input-group">                  
			      <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
			      <input type="text" class="form-control" name="location" minlength="3" autocomplete="off" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label>Email Address</label>
			    <div class="input-group">                  
			      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			      <input type="email" class="form-control" name="email" autocomplete="off" required>
			    </div>
			  </div>              
			  <div class="form-group ">
			    <label>Select parent type</label><br>
			    <div class="radio-inline">
			      <label>
			      <input type="radio" name="parent_type"  value="Father">
			      Father
			      </label>
			    </div>
			    <div class="radio-inline">
			      <label>
			      <input type="radio" name="parent_type" value="Mother" >
			      Mother
			      </label>
			    </div>
			    <div class="radio-inline">
			      <label>
			      <input type="radio" name="parent_type"  value="Guardian" checked>
			      Guardian
			      </label>
			    </div>
			  </div>

			  <div class="form-inline  text-center">
			    <button class="btn btn-success" type="submit" name="submit">Submit Details</button>
			    <button class="btn btn-warning" type="reset">Reset Form</button>
			    
			  </div>
			 

			  
			</form>


			<div class="row justify-content-center">
				<div class="col-md-8">
{{-- 					<form action="/" method="POST">
						@csrf
					 <div class="form-group">
					    <label>Select Pupil</label>
					    <div class="input-group">                  
					      <select name="pupilid" class="form-control">
					      @foreach($pupils as $pupil)
									<option value="{{$pupil->id}}">{{$pupil->fullname}}</option>
					      @endforeach			       
					       <option value=""></option>			       
					      </select>
					    </div>
					  </div>

					  <div class="form-group">
					    <label>Select Mother</label>
					    <div class="input-group">              
					     <select name="motherid" class="form-control">
					      <option value="">Please Select Pupils Mother</option>
					        <option value="">Pupil has no mother</option>			   @foreach($mothers as $mother)
							<option value="{{$mother->id}}">{{$mother->parent_fullname}}</option>
					      @endforeach         		        
					      </select>
					    </div>
					  </div>

					  <div class="form-group">
					    <label>Select Father</label>
					    <div class="input-group">                  
					        <select name="fatherid" class="form-control">
					         @foreach($fathers as $father)
						<option value="{{$father->id}}">{{$father->parent_fullname}}</option>
					      @endforeach
					      <option value="">Pupil has no Father</option>
					    </div>
					        
					      </select>
					    </div>
					  </div>

					  <div class="form-group">
					    <label>Select Guardian</label>
					    <div class="input-group">                  
					    <select name="guardian" class="form-control">
					      @foreach($guardians as $guardian)
							<option value="{{$guardian->id}}">{{$guardian->parent_fullname}}</option>
					      @endforeach
					        <option value="">No guardian details. (Father/Mother used)</option>
					    </select>
					    </div>
					  </div>
					  <div class="form-inline  text-center">
					    <button class="btn btn-success" type="submit" name="updateguardian">Submit Details</button>
					    <button class="btn btn-warning" type="reset">Reset Form</button>
					    
					  </div>
					
					</form> --}}
				</div>
			</div>

		</div>
	</div>
</div>
@endsection