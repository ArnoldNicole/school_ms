@extends('layouts.app')
@section('content')

<div class="container-fluid mb-5">
<div class="row justify-content-center">
		<div class="col-md-11">
			<div class="card">
			<div class="card-header">
				FEES PAYMENT DESK
			</div>
				<div class="bg-white mb-5">
				
				    <form action="/payfee/payfor/{{$pupil->id}}" method="POST" >
				    	@csrf
				    	<div class="form-group row">
                            <label for="fullname" class="col-md-4 col-form-label text-md-right">Pupil Full Names</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') ?? $pupil->fullname }}" required autocomplete="fullname" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
				      				    	@csrf
				      <div class="form-group row">				      	
				        <label for="classname" class="col-md-4 col-form-label text-md-right">Pupil Class</label>
				        <div class="col-md-6">
				        	@foreach($pupil->classes as $class)
				            <input id="" type="text" class="form-control @error('classname') is-invalid @enderror" name="classname" value="{{ old('classname') ?? $class->classname }}" required autocomplete="classname" autofocus>
				             @endforeach

				            @error('classname')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>
				       
				      </div>


				       <div class="form-group row">
				        <label  for="registration_number" class="col-md-4 col-form-label text-md-right">Admission number</label>
				        <div class="col-md-6">
				            <input id="registration_number" type="text" class="form-control @error('registration_number') is-invalid @enderror" name="registration_number" value="{{ old('registration_number') ?? $pupil->registration_number}}" required autocomplete="registration_number" autofocus>

				            @error('registration_number')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>
				      </div> 

				   <div class="form-group row">
				        <label for="receipt_number" class="col-md-4 col-form-label text-md-right">Receipt number</label>

				          <div class="col-md-6">
				              <input id="receipt_number" type="text" class="form-control @error('receipt_number') is-invalid @enderror" name="receipt_number" value="{{ old('receipt_number') }}" required autocomplete="receipt_number" autofocus>

				              @error('receipt_number')
				                  <span class="invalid-feedback" role="alert">
				                      <strong>{{ $message }}</strong>
				                  </span>
				              @enderror
				          </div>
				          
				        </div>

				        
				   <div class="form-group row">
				        <label for="banking_agent" class="col-md-4 col-form-label text-md-right">Banking Agent</label>
						<div class="col-md-6">
				              <input id="banking_agent" type="text" class="form-control @error('banking_agent') is-invalid @enderror" name="banking_agent" value="{{ old('banking_agent') }}" required autocomplete="banking_agent" autofocus>

				              @error('banking_agent')
				                  <span class="invalid-feedback" role="alert">
				                      <strong>{{ $message }}</strong>
				                  </span>
				              @enderror
				          </div>
				          
				  </div>


				  
				  <div class="form-group row">
				        <label for="date_banked" class="col-md-4 col-form-label text-md-right">Date paid to bank</label>

				          <div class="col-md-6">
				              <input id="date_banked" type="date" class="form-control @error('date_banked') is-invalid @enderror" name="date_banked" value="{{ old('date_banked') }}" required autocomplete="date_banked" autofocus>
				
				              @error('date_banked')
				                  <span class="invalid-feedback" role="alert">
				                      <strong>{{ $message }}</strong>
				                  </span>
				              @enderror
				          </div>
				          
				        </div>
				
				  <div class="form-group row">
				        <label for="amount_Paid" class="col-md-4 col-form-label text-md-right">Amount Paid</label>

				        <div class="col-md-6">
				              <input id="amount_Paid" type="number" class="form-control @error('amount_Paid') is-invalid @enderror" name="amount_Paid" value="{{ old('amount_Paid') }}" min="100" max="50000" required autocomplete="amount_Paid" autofocus>

				              @error('amount_Paid')
				                  <span class="invalid-feedback" role="alert">
				                      <strong>{{ $message }}</strong>
				                  </span>
				              @enderror
				          </div>
				  </div>


				  <div class="form-group row">
				        <label for="date_of_payments" class="col-md-4 col-form-label text-md-right">Date of payments</label>

				        <div class="col-md-6">
				              <input id="date_of_payments" type="date" class="form-control @error('date_of_payments') is-invalid @enderror" name="date_of_payments" value="{{ old('date_of_payments') }}" required autocomplete="date_of_payments" autofocus>
				              <span class="is-valid" role="alert">Date recording this transaction. Date Today.

				              @error('date_of_payments')
				                  <span class="invalid-feedback" role="alert">
				                      <strong>{{ $message }}</strong>
				                  </span>
				              @enderror
				          </div>
				  </div>
				  
				   <div class="form-group row">
				        <label for="name" class="col-md-4 col-form-label text-md-right">Receiving Secretary</label>

				        <div class="col-md-6">
				              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ??auth()->user()->name }}" required autocomplete="name" autofocus>

				              @error('name')
				                  <span class="invalid-feedback" role="alert">
				                      <strong>{{ $message }}</strong>
				                  </span>
				              @enderror
				          </div>
				  </div>

				  <div class="input-group row">
				  	<label for="" class="col-md-4 col-form-label text-md-right">Confirmation</label>
				  	 <div class="col-md-6">
				              <input type="checkbox" name="required" required> <p class="form-inline">
				               I {{auth()->user()->name}} confirm recording this transaction and<b> admit answerable </b> to any complains concerning the receipt. </p>
				          </div>
				  </div>
				   
				    <div class="input-group row justify-content-center">
				        <button class="btn btn-success" type="submit">Start Transation</button>
				      </div>
				
				</form>


			</div>{{--card-body --}}

		</div>{{--card--}}
	</div>{{--col-md-12--}}
	</div>{{--row--}}
</div>{{-- wrapper container-fluid --}}


@endsection