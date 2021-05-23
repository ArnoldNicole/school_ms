@extends('layouts.app')
@section('additional-links')

@endsection
@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<h3 class="h3 font-weight-bold text-danger">EXAM RESULTS CENTER</h3>
	</div>
</div>
<div class="row justify-content-center mt-3 bg-white">
	<div class="col-md-6 border border-left-0 border-top-0 border-bottom-0 border-info">
		<h4 class="text-center font-weight-bold text-info h4">Pupil results center</h4>
						
			<div class="row justify-content-center">
			<div class="col-md-10">
				<form action="/exams/getResultsForExamMark" method="post">
					<div class="row mb-3">
								<label for="class" class="col-md-4 col-form-label text-md-right">
									Select Class
								</label>
								<div class="col-md-8">
									<select name="class" id="allclasses"  class="form-control">
										@foreach($classes as $class)
										<option value="{{$class->id}}">{{$class->classname}}</option>
										@endforeach
									</select>

									<div id="pupil_class_errors"></div>
								</div>
					</div>

						<div class="row mb-3">
							<label for="" class="col-md-4 col-form-label text-md-right">Select Pupil</label>
							<div class="col-md-8">
									<select  id="pupil_lists" name="pupil" class="form-control" >
										
									</select>
								</div>
						</div>

						<div class="row mb-3">
							<label for="" class="col-md-4 col-form-label text-md-right">Select Exam</label>
							<div class="col-md-8">
									<select  id="pupil_exams" name="exam" class="form-control" >
										
									</select>

									<div id="pupil_exams_errors"></div>
								</div>
						</div>
							
						
						<div class=row">
							<div class="col-md-12">
								@csrf
								<button type="submit" class="btn btn-block btn-primary">Get individual pupil Results</button>
							</div>
							
						</div>
				</form>
			</div>
			</div>

	</div>

	<div class="col-md-6">
		<form action="/exams/getResultsForClassSelected" method="POST">
			<div class="row bg-white">
				<div class="col-md-12">
					<h4 class="font-weight-bold h4 text-dark">Class Exam Results</h4>
					<div class="form-group row">
						<label for="" class="col-md-4 col-form-label text-md-right">Select Class</label>
						<div class="iput-group col-md-8">
							<select name="classesMarklis" id="classesMarklis" class="form-control">
								@foreach($classes as $class)
										<option value="{{$class->id}}">{{$class->classname}}</option>
										@endforeach
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-md-4 col-form-label text-md-right">Select Exam</label>
						<div class="iput-group col-md-8">
							<select name="FoundexamLists" id="FoundexamLists" class="form-control">
								
							</select>
							<div id="Term_class_errors"></div>
						</div>
					</div>

					<div class="form-group row">
						@csrf
						<div class="iput-group col-md-12">
							<button class="btn btn-block btn-success">Load Results For Selected Class</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/jquery3.1.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#allclasses').on('change',function(){
			var classid=$(this).val();
			if (classid) {
				$.ajax(
				{
					type:'GET',
					url:'/exams/fetchclass',
					data:{'class':classid},
					success:function (data) {
                      $('#pupil_lists').html(data);
                     }
				})
			} 
			else{
					$('#pupil_class_errors').html('<span>Please select class first</span>');
			} 
			
		});
	}
);

	$(document).ready(function(){
		$('#pupil_lists').on('change',function(){
			var pupilid=$(this).val();
			if (pupilid) {
				$.ajax(
				{
					type:'GET',
					url:'/exams/fetchpupil',
					data:{'pupil':pupilid},
					success:function (data) {
                      $('#pupil_exams').html(data);
                     }
				})
			}
			else{
					$('#pupil_exams_errors').html('<span>Please select pupil first</span>');
			} 
			
		});
	}
);

	$(document).ready(function(){
		$('#classesMarklis').on('change',function(){
			var selectedClass=$(this).val();
			if (selectedClass) {
				$.ajax(
				{
					type:'GET',
					url:'/exams/fetchSelectedClass',
					data:{'selectedClass':selectedClass},
					success:function (data) {
                      $('#FoundexamLists').html(data);
                     }
				})
			} 
			else{
					$('#Term_class_errors').html('<span>Please select class first</span>');
			} 
			
		});
	}
);

	
</script>
@endsection