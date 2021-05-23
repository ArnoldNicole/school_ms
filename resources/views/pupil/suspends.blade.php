@extends('layouts.app')
@section('content')
      <section class="wrapper">
      	<div class="row justify-content-center">
      		<div class="col-md-8">
      			@if($message = Session::get('error'))
      			 <div class="alert alert-dismissible alert-danger">
      			   <span class="close" data-dismiss="alert">&times;</span>
      			   {{$message}}
      			 </div>                    
      			 @endif
      		</div>
      	</div>
        <h3><i class="fa fa-angle-right"></i> Suspension Form</h3>
        
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">      


          <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Suspension and Expulsion`s desk.</h4>
            <form action="/pupil/SuspensionForm" method="POST">
				@csrf
              <div class="form-group">
                <select name="id" class="form-control">
                  <option value="">Select Pupil</option>      
                  @foreach($pupils as $pupil)
				<option value="{{$pupil->id}}">{{$pupil->fullname}} {{$pupil->registration_number}}</option>
                  @endforeach
                </select>
                <br>
                <button class="btn btn-theme04" type="submit" name="populate">Populate</button>
              </div>
            </form>
          
                </div>

          <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Suspension Details</h4>
            <p>When a pupil is admitted their status in the class sheet is marked suspended. The pupil cannot have his details updated or changed, cannot have fees payment transacted during the period. More than Three suspensios might dictate an expulsion and on expulsion <b>The pupil`s data is put in archive mode and can only be accessed with advanced creteria to ensure data security.</b>Pupils are advissed to desist from getting suspended.<b>Note that transfers are not treated as expulsions but the data is handled almost the same.</p>
            <ul class="contact_details">
              <li><i class="fa fa-envelope-o"></i> info@yoursite.com</li>
              <li><i class="fa fa-phone-square"></i> +34 5565 6555</li>
              <li><i class="fa fa-home"></i> Some Fine Address, 887, Manchester, Wamae.</li>
            </ul>
            <!-- contact_details -->
          </div>
        </div>
        <hr>
         <div class="well detailed">
          <h4>RE_ADMISSIONS</h4>
            <form action="/pupil/SuspensionEnd" method="post"> 
            @csrf             
              <div class="form-group">
                <label>Select Pupil to readmit</label>
               <div class="input-group">
                <span class="input-group-addon">Name</span>
                  <select name="id" class="form-control">
                    <option value="">Select Pupil to readmit back to class</option>
                    
                    @foreach($suspendedPupils as $suspendedPupil)
                    <option value="{{$suspendedPupil->id}}">{{$suspendedPupil->registration_number}} {{$suspendedPupil->fullname}} </option>
                    @endforeach
                    

                 
                  </select>
                </div>
              </div>
              <button align="center" type="submit" class="btn btn-outline-secondary">Re-Admit</button>
            </form>
           
            
          </div>
        <!-- /row -->


        <!-- /row -->
      </section>
@endsection