@extends('layouts.app')
@section('content')
<div class="container-fluid wrapper">
        <h4><i class="fa fa-book"></i>Pupil registration desk. </h4>
       @if($message = Session::get('success'))
     <div class="row justify-content-center alert alert-dismissible alert-success row justify-content-center">
       <span class="close" data-dismiss="alert">&times;</span>
       {{$message}}
     </div>                    
     @endif
       @if($message = Session::get('error'))
     <div class="row justify-content-center alert alert-dismissible alert-danger row justify-content-center">
       <span class="close" data-dismiss="alert">&times;</span>
       {{$message}}
     </div>                    
     @endif
     <div class="row justify-content-center alert alert-dismissible alert-info row justify-content-center">
       <span class="close" data-dismiss="alert">&times;</span>
       {{$response ?? 'Hello there'}}
     </div>
          <div class="col-lg-12 mt-1">
            <div class="row card-body">
              <div class="card-header">
                <ul class="nav nav-tabs nav-justified list-group">
                  <li class="active">
                    <a data-toggle="tab" href="#overview" class="list-group-item">Personal Info</a>
                  </li>
                  
                  <li>
                    <a data-toggle="tab" href="#subjects" class="list-group-item"> Subjects</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit" class="list-group-item">Finance </a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="card-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">                     
                        <div class="col-md-12 justify-content-center">
                        <h4 class="mb">Personal Information</h4>
                        <form class="form-horizontal" method="post" action="/pupil/newPupil/save">
                          @csrf
                        <div class="form-group">
                            <label class="label text-dark font-weight-bold">Full Names</label>
                            <div class="col-md-12">
                              <input type="text" placeholder="Full Names" value="{{ old('pupilfullname') }}" class="form-control @error('pupilfullname') is-invalid @enderror" name="pupilfullname" required>
                              <br>
                               @error('pupilfullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="label text-dark font-weight-bold">Address</label>
                            <div class="col-md-12">
                              <input type="text"  value="{{ old('pupiladdress') }}" placeholder="Address"  class="form-control @error('pupiladdress') is-invalid @enderror" name="pupiladdress" required>
                              <br>
                               @error('pupiladdress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="label text-dark font-weight-bold">Registration number</label>
                            <div class="col-md-12">
                              <input type="text"  value="{{ old('registration_number') }}" placeholder="Assign registration number" name="registration_number" class="form-control @error('registration_number') is-invalid @enderror" required >
                              <br>
                               @error('registration_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="label text-dark font-weight-bold">UPI number</label>
                            <div class="col-md-12">
                              <input type="text" placeholder="UPI number" name="upi_number" class="form-control @error('upi_number') is-invalid @enderror"  value="{{ old('upi_number') }}" required>
                              <br>
                               @error('upi_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="label text-dark font-weight-bold">Birth certificate number</label>
                            <div class="col-md-12">
                              <input type="text" placeholder="Birth Certificate number" name="birth_certificate_number"  value="{{ old('birth_certificate_number') }}" class="form-control @error('birth_certificate_number') is-invalid @enderror" required>
                              <br>
                               @error('birth_certificate_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="label text-dark font-weight-bold">Date admitted</label>
                            <div class="col-md-12">
                              <input type="date" placeholder="" name="date_of_admission"  value="{{ old('date_of_admission') }}" class="form-control @error('date_of_admission') is-invalid @enderror" required>
                              <br>
                               @error('date_of_admission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                    
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="label text-dark font-weight-bold">Date of birth.</label>
                            <div class="col-md-12">
                              <input type="date" placeholder=" " name="date_of_birth"  value="{{ old('date_of_birth') }}" class="form-control @error('date_of_birth') is-invalid @enderror" required>
                              <br>
                               @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <button style="float: center;" type="submit" name="register">Register pupil</button>
                        </form>

                        
                      </div>
                      

                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
        <div id="subjects" class="tab-pane">
          <div class="row">
            <div class="col-md-12">
              <h4 class="mb">Subjects selection</h4>
              
              <h5 class="mb">Primary subjects</h5>
              <form action="/pupil/newPupil/save/{{ $newPupil->id ?? 1 }}" method="post" >
                @csrf
                <div class="well checkbox">
                <span>Select all in this section</span><br>
                <label><input type="checkbox" value="English" name="English" required>English</label><br>
                <label><input type="checkbox" value="Kiswahili" name="Kiswahili" required>Kiswahili</label><br>
                <label><input type="checkbox" value="Maths" name="Maths" required>Maths</label><br>
                <label><input type="checkbox" value="SocialStudies" name="SocialStudies" required>Social Studies</label><br>
                <label><input type="checkbox" value="Science" name="Science"required>Science</label><br>
                <label><input type="checkbox" value="C.R.E" name="ReligiousEducation" required>ReligiousEducation</label><br>
                             
                
                
                
                </div>
                <hr>
                <div class="well">
                 <span>Chooose one</span> <br>
                 <input type="radio" name="optional" value="ComputerStudies" checked>Computer Studies<br>
                 <input type="radio" name="optional" value="Music">Music<br>
                 <input type="radio" name="optional" value="French">French<br>
                 <input type="radio" name="optional" value="German">German<br>
                </div> 
                <?php
                $newPupil;
                if ($newPupil == "") {
                   echo "<span>Waiting...</span>";
                 }else{
                  echo '<button class="btn btn-primary" type="submit" name="subjects">Submit Subjects</button> ';
                 } 
                 ?>                                
                
                
                            
              </form>
            </div>
            
          </div>
          
        </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane">
                    <div class="row">
                     <form method="POST" action="/pupil/newPupilgenderSet/{{$newPupil->id ?? ""}}"> 
                     
                         <div class="col-md-12">
                        <h4 class="mb">Completing registration.</h4>
                        <h4 class="mb" style="color:gold !important;">Payments</h4>
                    
                    
                    @csrf
                         <div class="form-group">
                            <label>Admitted to class</label>
                            <div class="col-md-12">
                              <select name="class" class="form-control">
                               @foreach($classes as $class)
                                  <option value="{{$class->id}}">{{$class->classname}}</option>
                               @endforeach
                              </select>

                            </div>
                          </div>
                          <hr><br>
                          <div class="form-group">
                            <label>Admission fees <span style="color:red;"><sup><b>*</b></sup></span></label>
                            <div class="col-md-12">
                              <input type="number" name="admfees" class="form-control" min="200" max="500" required>
                            </div>
                          </div>
                          <hr><br>
                          <div class="form-group">
                            <label>Gender</label>
                            <div class="col-md-12">
                              <input type="radio" name="gender" value="male">Male<br>
                              <input type="radio" name="gender" value="female">Female<br>
                            </div>
                            
                          </div>
                          

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                               <?php
                $newPupil;
                if ($newPupil == "") {
                   echo "<span>Waiting...</span>";
                 }else{
                  echo '<button class="btn btn-theme" name="finish" type="submit">Submit and Finish</button>';
                 } 
                 ?> 
                            
                              
                            </div>
                          </div>                       
                                             
                                              
                        </form>
                       

                      </div>

                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->


 </div>
 @endsection