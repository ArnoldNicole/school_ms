@extends('layouts.app')
@section('content')

<div class="container-fluid wrapper">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h3 class="h3 text-center font-weight-bold text-info ">New Teacher Registration Form</h3>
			<form action="/newteacher/save" method="POST">
				@csrf
			  <div class="form-group">
			              <label  for="" class="font-weight-bold text-dark"><strong>Teacher Identification Number</strong></label>
			              <div class="input-group">			                
			                <input type="number" minlength="4"  maxlength="5"name="teacherid" class="form-control 
			                @error('teacherid') is-invalid @enderror" value="{{ old('teacherid')}}" required>
			                @error('teacherid')
								<span class="alert alert-danger">{{$message}}</span>
			                @enderror
			              </div>   
			           </div>
			           <div class="form-group">
			              <label for="" class="font-weight-bold text-dark"><strong>Full Names</strong></label>
			              <div class="input-group">
			                
			                <input type="text" minlength="3" name="teachername" class="form-control 
			                @error('teachername') is-invalid @enderror" value="{{ old('teachername')}}" required>
			                @error('teachername')
								<span class="alert alert-danger">{{$message}}</span>
			                @enderror
			              </div>   
			           </div>
			           <div class="form-group">
			              <label for="" class="font-weight-bold text-dark"><strong>Date joined Us</strong></label>
			              <div class="input-group">
			                
			                <input type="date" name="dateadmitted" class="form-control 
			                @error('dateadmitted') is-invalid @enderror" value="{{ old('dateadmitted')}}" required>
			                @error('dateadmitted')
								<span class="alert alert-danger">{{$message}}</span>
			                @enderror
			              </div>   
			           </div>
			           
			           <div class="form-group">
			              <label for="" class="font-weight-bold text-dark"><strong>National Identification Number</strong></label>
			              <div class="input-group">
			                
			                <input type="number" minlength="7" maxlength="10" name="nationalid" class="form-control 
			                @error('nationalid') is-invalid @enderror" value="{{ old('nationalid')}}" required>
			                @error('nationalid')
								<span class="alert alert-danger">{{$message}}</span>
			                @enderror
			              </div>   
			           </div>
			           <div class="form-group">
			              <label for="" class="font-weight-bold text-dark"><strong>TSC Number</strong></label>
			              <div class="input-group">
			                
			                <input type="number" minlength="7" maxlength="10" name="tscno" class="form-control 
			                @error('tscno') is-invalid @enderror" value="{{ old('tscno')}}" required>
			                @error('tscno')
								<span class="alert alert-danger">{{$message}}</span>
			                @enderror
			              </div>   
			           </div>
			           <div class="form-group">
			              <label for="" class="font-weight-bold text-dark"> <strong>Primary Subject</strong></label>
			              <div class="input-group">
			                <select name="subject1" class="form-control 
			                @error('subject1') is-invalid @enderror">
			                  <option value="">Select Subject</option>

			                   <option value="English">English</option>
			                   <option value="Kiswahili">Kiswahili</option>
			                   <option value="Maths">Maths</option>
			                   <option value="SocialStudies">Social Studies</option>
			                   <option value="Science">Science</option>
			                   <option value="C.R.E">C.R.E</option>
			                   <option value="ComputerStudies">Computer Studies</option>
			                    <option value="Music">Music</option>
			                   <option value="French">French</option>
			                   <option value="German">German</option>
			                
			                </select>
			              </div>   
			           </div>
			           <div class="form-group">
			              <label for="" class="font-weight-bold text-dark"><strong>Secondary Subject</strong></label>
			              <div class="input-group">
			                <select name="subject2" class="form-control 
			                @error('subject2') is-invalid @enderror">
			                  <option value="">Select Subject</option>
			                
			                    <option value="English">English</option>
			                   <option value="Kiswahili">Kiswahili</option>
			                   <option value="Maths">Maths</option>
			                   <option value="SocialStudies">Social Studies</option>
			                   <option value="Science">Science</option>
			                   <option value="C.R.E">C.R.E</option>
			                   <option value="ComputerStudies">Computer Studies</option>
			                    <option value="Music">Music</option>
			                   <option value="French">French</option>
			                   <option value="German">German</option>
			                
			                </select>
			              </div>   
			           </div>

			           <div class="form-inline  text-center">
			                <button class="btn btn-success" type="submit">Submit Details</button>
			                <button class="btn btn-warning" type="reset">Reset Form</button>
			                
			              </div>
			           
			</form>
		</div>
	</div>
</div>

@endsection