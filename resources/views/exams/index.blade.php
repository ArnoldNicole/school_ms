@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
	<div class="col-md-11">
		<form action="/exams/uploadMarklist/save/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="ExamCode" class="col-md-4">Exam Code</label>
				<div class="col-md-8 input-group">
					<input type="text" name="ExamCode" class="form-control @error('ExamCode') is-invalid @enderror" value="{{old('ExamCode')}}">
					@error('ExamCode')
							<span class="alert alert-danger">{{$message}}</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="TeacherCode" class="col-md-4">Tr. Code</label>
				<div class="col-md-8 input-group">
					<input type="text" name="TeacherCode" class="form-control @error('TeacherCode') is-invalid @enderror" value="{{old('TeacherCode')}}">
					@error('TeacherCode')
							<span class="alert alert-danger">{{$message}}</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="ExamMarklist" class="col-md-4">Select Excel Marklist
					<a class="float-right" onclick="Help();" onmouseleave="closeHelp();">Help</a></label>
				<div class="col-md-8 input-group">
					<input type="file" name="ExamMarklist" class="form-control @error('ExamMarklist') is-invalid @enderror" value="{{old('ExamMarklist')}}">
					@error('ExamMarklist')
							<span class="alert alert-danger">{{$message}}</span>
					@enderror
					<div class="card" id="helpDiv" style="display: none">
						<div class="card-header">
							EXCEL FILE HELP
						</div>
						<div class="card-body">
							<p class="p-0 card-text">Make sure your excel file follows all the guidelines. <strong>Class Code</strong> and <strong>Id</strong> on <kbd>cell B2</kbd> and <kbd>Cell B3</kbd> Respectively, <strong>No Merged Cells</strong>, <strong>No Formulas</strong> and <strong>No merged cells</strong>.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				
				<div class="col-md-8 input-group">
					<button class="btn btn-outline-primary btn-block">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
@section('scripts')
<script>
	function Help(){
		var helpDiv=document.getElementById('helpDiv');
		helpDiv.style.display="block"
	}
	function closeHelp(){
		var helpDiv=document.getElementById('helpDiv');
		helpDiv.style.display="none"
	}
</script>
@endsection