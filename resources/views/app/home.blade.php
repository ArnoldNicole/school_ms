@extends('layouts.app')
@section('content')
<div class="container-fluid wrapper">
	<div class="row justify-content-center">
			<h4>DASHBOARD</h4>		
	</div>
	<div class="row justify-content-center card " style="min-height: 700px">
		<div class="card-body col-md-11">
			<div class="row">


				<div class="col-md-6 ">
					<div class="card">
						@if($message = Session::get('success'))
						 <div class="alert alert-dismissible alert-success row justify-content-center">
						   <span class="close" data-dismiss="alert">&times;</span>
						   {{$message}}
						 </div>                    
						 @endif

						 @if($message = Session::get('error'))
						 <div class="alert alert-dismissible alert-danger row justify-content-center">
						   <span class="close" data-dismiss="alert">&times;</span>
						   {{$message}}
						 </div>                    
						 @endif
						<div class="card-header text-dark bg-dark p-0">
							<h5 class="text-info font-weight-bold h5 p-1 m-0">ACTIVE CLASSES</h5>
						</div>
						<div class="card-body">
							<canvas id="serverstatus03" class="img-fluid" height="100"></canvas>
							<script>
							  var doughnutData = [{
							      value: 34,
							      color: "#FF6B6B"
							    },
							    {
							      value: 40-34,
							      color: "#fdfdfd"
							    }
							  ];
							  var myDoughnut = new Chart(document.getElementById("serverstatus03").getContext("2d")).Doughnut(doughnutData);
							</script>
						</div>
						<div class="card-footer">
							<p>Total Classes: 6 </p>
						</div>
					</div>


				 
				  <!-- /grey-panel -->
				</div>


			</div>
		</div>
		<div class="card-footer">
			{{auth()->user()->name}}
		</div>
	</div>
</div>
@endsection

@section('scripts')

@endsection