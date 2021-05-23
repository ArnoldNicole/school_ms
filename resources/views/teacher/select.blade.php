@extends('layouts.app')
@section('content')

<div class="wrapper container-fluid">
	<form action="/teacherPopulateUpdateForm" method="POST">
	<div class="row container-fluid card-body">		
		<div class="col-md-9">
			@csrf
			<div class="form-group">
				<select name="id" id="" class="form-control">
				@foreach($teachers as $teacher)
					<option value="{{$teacher->id}}">{{$teacher->teacherid}}  {{$teacher->teachername}}</option>
				@endforeach
				</select>
			</div>
				
			
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-success btn-block">populate</button>
		</div>		
	</div>
	</form>
</div>

@endsection