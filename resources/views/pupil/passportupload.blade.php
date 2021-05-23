@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-5 bg-white ">
	<div class="col-md-8 mt-3 mb-4">
		<form action="/pupil/passportPhoto/upload" class="form" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="registration_number" class="col-md-4  col-form-label text-md-right">Admission Number</label>
				<div class="col-md-8">
					<input type="text" name="registration_number" value="{{$pupil->registration_number ?? @old('registration_number') ?? ''}}" class="form-control @error('registration_number') is-invalid  @enderror" required/>
					@error('registration_number')
					<div class="row justify-content-center mt-2">
						<div class="col-md-12">							
							<span class="text-danger font-weight-bold" >{{$message}}</span>							
						</div>
					</div>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="registration_number" class="col-md-4  col-form-label text-md-right">Select Passport Photo</label>
				<div class="col-md-8">
					<input type="file" name="photo" value="{{@old('photo')}}" class="form-control @error('photo') is-invalid  @enderror" required/>
					@error('photo')
					<div class="row justify-content-center mt-2">
						<div class="col-md-12">	
							<span class="text-danger font-weight-bold" >{{$message}}</span>
							</div>
					</div>
					@enderror
				</div>
			</div>

			<div class="form-group row justify-content-end">				
				<div class="input-group col-md-8">
					<button class="btn btn-block btn-success font-weight-bold text-white" type="submit">Save pupil Passport Photo</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection