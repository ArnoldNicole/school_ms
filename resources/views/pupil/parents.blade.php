@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center mb-2">
		<div class="col-md-6">
			<a href="/pupil/Detailed/{{$pupil->id}}" class="btn btn-outline-success btn-block">Back to {{$pupil->fullname}}`s Profile</a>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-12 bg-dark">
			<div class="h4 text-info p-1 font-weight-bold text-center ">{{$pupil->fullname}} Parent Records <a href="/parents" class="btn btn-sm btn-info float-right">Add New Parent</a>	</div>

			@foreach($parents as $parent)
			<div class="well">
				<p class="font-weight-bold text-white">Parent Name: <span class="text-success font-weight-bold">{{$parent->parent_fullname}}</span></p>
				<p class="font-weight-bold text-white">Parent Type: <span class="text-success font-weight-bold">{{$parent->parent_type}}</span></p>
				<p class="font-weight-bold text-white">Parent Phone :<span class="text-success font-weight-bold">+254{{$parent->phone1}}</span></p>
				<p class="font-weight-bold text-white">Emergency Contact :<span class="text-success font-weight-bold">+254{{$parent->phone2}}</span></p>
				<p class="font-weight-bold text-white">National Id Number: Hidden <a href="#" onclick="document.getElementById('idnumber.{{$parent->id}}').style.display='block'" onmouseleave="document.getElementById('idnumber.{{$parent->id}}').style.display='none'">Click to reveal</a>
					<span style="display: none" id="idnumber.{{$parent->id}}" class="text-success h4">{{$parent->nationalidno}}</span></p>
			</div>
			<hr>

			@endforeach
			<div class="row justify-content-center">
				<div class="col-md-10">
					<h4 class="text-center text-dark font-weight-bold">Select Parents as Desired</h4>
					<form action="/parents/pupilParentBinding/{{$pupil->id}}" method="post">
						@csrf
						<div class="form-group row">
							<label for="" class="col-md-3 text-danger font-weight-bold text-right">Father</label>
							<div class="col-md-9 input-group">								
								<select name="father" id="" class="form-control">
									@foreach($fathers as $father)
											@if($pupil->parents->contains($father->id))
											<option value="0">Father Exists</option>

											@else
										<option class="form-control" value="{{$father->id ?? 0}}">{{$father->parent_fullname}}</option>
											@endif
									@endforeach
									<option value="0">Unavailable</option>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="" class="col-md-3 text-danger font-weight-bold text-right">Mother</label>
							<div class="col-md-9 input-group">
								
								<select name="mother" id="" class="form-control">
									@foreach($mothers as $mother)
									@if($pupil->parents->contains($mother->id))
											<option value="0">Mother Exists</option>
											@else
									<option class="form-control" value="{{$mother->id ?? 0}}">{{$mother->parent_fullname}}</option>
									@endif
									@endforeach
									<option value="0">Unavailable</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<label for="" class="col-md-3 text-danger font-weight-bold text-right">Guardian</label>
							<div class="col-md-9 input-group">
								
								<select name="guardian" id="" class="form-control">
									<option value="0">Unavailable</option>
									@foreach($guardians as $guardian)
									@if($pupil->parents->contains($guardian->id))
											<option value="0">Guardian Exists</option>
											@else
									<option class="form-control" value="{{$guardian->id ?? 0}}">{{$guardian->parent_fullname}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-info">Add Parents</button>
						</div>
						
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection