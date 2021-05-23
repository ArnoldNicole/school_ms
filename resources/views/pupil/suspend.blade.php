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
          <form class="contact-form " role="form" action="/Suspend/{{$student->id}}" method="POST">
          	@csrf
              <div class="form-group">  
              <label class="font-weight-bold text-dark ">Admission number</label>                   
              <div class="input-group">                
                    <input type="number" class="form-control" name="registration_number" value="{{$student->registration_number }}" readonly>
                                             
              </div>
            </div>  
@foreach($parents as $parent)
  <div class="form-group">  
  <label class="font-weight-bold text-dark ">{{$parent->parent_type}} Email</label>                   
  <div class="input-group">  	
        <input type="email" class="form-control" name="{{$parent->parent_type}}_email" value="{{$parent->email}}" readonly>                                                
  </div>
</div>

  <div class="form-group">
    <label class="font-weight-bold text-dark ">{{$parent->parent_type}} Phone number</label>
  <div class="input-group">   	
        <input type="number" class="form-control" name="{{$parent->parent_type}}_contact" value="{{$parent->phone1}}" diasbled>
          
  </div>
</div>
@endforeach
     <div class="form-group">
                <input type="text" name="subject" class="form-control" id="contact-subject" placeholder="Suspension Reason" minlength="20" required>
                
              </div>

              <div class="form-group">
                <textarea class="form-control" name="message"  placeholder="Your Message" rows="5" minlength="50" required></textarea>
                
              </div>

              

              <div class="form-send">
                <button type="submit" name="suspend" class="btn btn-large btn-primary">Suspend.</button>
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
        
        <!-- /row -->


        <!-- /row -->
      </section>
@endsection