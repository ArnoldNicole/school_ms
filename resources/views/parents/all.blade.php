@extends('layouts.app')
@section('content');
<div class="container-fluid row">
	<div class="col-md-12">
@foreach($parents as $parent)
<div class="row justify-content-center mb-2 bg-dark mt-3">
	<div class="col-md-7">
			<p class="font-weight-bold text-center text-dark ">Parent Full Name:<strong> <span class="text-success">{{$parent->parent_fullname}}</span></strong></p>
			<p class="font-weight-bold text-center text-dark ">Relation :
				<strong> <span class="text-success">{{$parent->parent_type}}</span></strong></p>
			
			<hr>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8">
						<h4>Contact Details</h4>
						<p><span><i class="fa fa-phone"></i> <a href="tel:+254{{$parent->phone1}}">+254{{$parent->phone1}}</a></span></p>
						<p><span><i class="fa fa-phone"></i> <a href="tel:+254{{$parent->phone2}}">+254{{$parent->phone2}}</a></span></p>
						<p><span><i class="fa fa-envelope"></i><a href="{{$parent->email}}" target="_blank"></a>{{$parent->email}}</span></p>

					</div>
					
				</div>

			</div>
			</div>

			<div class="col-md-5">
				<div class="card">
					<div class="card-header bg-transparent">{{$parent->parent_fullname}}</div>
					<div class="card-body">
										   @if($parent->pupil->count()==0)
											<p class="alert alert-danger">
												<span class="font-weight-bold text-center text-dark"> No pupil Available</span>
											</p>
											@else
						@foreach($parent->pupil as $pupil)						

											<ul class="list-group">
												<li class="list-group-item">
													Pupil Name: <strong><span><a href="/pupil/Detailed/{{$pupil->id}}">{{$pupil->fullname}}</a></span></strong>
													
												</li>
											</ul>
						@endforeach
												
												
										   @endif
								
								
						
					</div>
				</div>
				

			</div>
		</div>
@endforeach

	</div>
</div>
@endsection