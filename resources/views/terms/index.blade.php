@extends('layouts.app')
@section('additional-links')
 
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
 @endsection
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		@if($message = Session::get('success'))
		 <div class="alert alert-dismissible alert-success">
		   <span class="close" data-dismiss="alert">&times;</span>
		   {{$message}}
		 </div>                    
		 @endif
	</div>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered dt-responsive" id="example">
			  <thead>
			    <tr>
			      <th>S/NO</th>
			      <th>TERM</th>
			      <th>YEAR</th>
			      <th>STARTS</th>
			      <th>ENDS</th>
			      <th></th>			      
			    </tr>
			    <!--fullname admno upino classadmittedto gender status -->
			  </thead>
			  <tbody>
			    @foreach($terms as $term)
			    <tr class="gradeX">
			      <td>{{$term->id }}</td>
			      <td>{{$term->termname }}</td>
			      <td>{{$term->termyear }}</td>
			      <td>{{$term->startdate}}</td>
			      <td>{{$term->enddate}}</td>
			      <td>{{$term->user->name}}</td>
			      </tr> 
			    @endforeach 
			                   
			  </tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('scripts')
 <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
 <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('js/responsive.bootstrap4.min.js')}}"></script>

 <script>
 $(document).ready(function(){
  $('#example').DataTable();
 });
</script>
 @endsection