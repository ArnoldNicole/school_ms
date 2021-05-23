@extends('layouts.app')
@section('content')
		<div class="container-fluid">

			<div class="row justify-content-center">
				<div class="col-md-12">
					
					@if($message = Session::get('success'))
					 <div class="alert alert-dismissible alert-success row justify-content-center">
					   <span class="close" data-dismiss="alert">&times;</span>
					   {{$message}}
					 </div>                    
					 @endif

				</div>
			</div>

			<div class="row justify-content-center mt-5">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-dark text-white font-weight-bold text-center ">
							
							<span class="h3">{{$event->eventdate}}</span>
							<a href="/EditTermEvents/{{$event->id}}" class="float-right btn btn-sm btn-primary">Edit Event</a>
							</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="card">
										<div class="card-header text-w
										 font-weight-bold bg-dark text-white">TERM</div>
										<div class="card-body">
											<span class="text-center text-dark">{{$event->term->termname}}</span>
											<br>
											<span class="text-center text-dark">STARTS: {{$event->term->startdate}}</span>
											<br>
											<span class="text-center text-dark">ENDS: {{$event->term->enddate}}</span>

										</div>
									</div>
								</div>
								<div class="col-md-8">
									<div class="card">
										<div class="card-header bg-dark">
											<div class="text-white">EVENT DETAILS</div>
										</div>
									<div class="card-block">
										<div class="card-body">
											<span class="text-center text-dark">Created {{$event->created_at->diffForHumans()}}</span><br>
											<span class="text-center text-dark"> {{$event->eventdate}}</span><br>
											<span>{!! html_entity_decode($event->description) !!}</span>

										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
@endsection