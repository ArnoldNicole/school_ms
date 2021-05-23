@extends('layouts.app')

@section('additional-links')

 <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">

 @endsection

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			@if($message = Session::get('success'))
			 <div class="alert alert-dismissible alert-success row justify-content-center">
			   <span class="close" data-dismiss="alert">&times;</span>
			   <span class="animated flash infinite">{{$message}}</span>
			 </div>                    
			 @endif

			 @if($message = Session::get('error'))
			 <div class="alert alert-dismissible alert-danger row justify-content-center">
			   <span class="close" data-dismiss="alert">&times;</span>
			   <span class="animated flash infinite">{{$message}}</span>
			 </div>                    
			 @endif
		</div>
	</div>
	<div class="row justify-content-center mt-5">
		<div class="col-md-12">
			<table class="table bg-white table-bordered dt-responsive" id="example">
			  <thead>
			    <tr>
			      <th>Term Name</th>
			      <th>Start Date</th>
			      <th>End Date</th>
			      <th>Events</th>
			      <th></th>
			      <th>Action</th>				      		      
			     </tr>
			    <!--fullname admno upino classadmittedto gender status -->
			  </thead>
			  <tbody>
			    @foreach($terms as $term)
			    <tr class="">
			      <td>{{$term->termname }}</td>
			      <td>{{$term->startdate }}</td>
			      <td>{{$term->enddate}}</td>
			      <td>{{$term->event->count() }}</td>
			      <td><a href="/termDetails/{{$term->id}}" class="btn btn-outline-info">More</a></td>
			      <td>@if($term->status!="Billed")
					<a href="/billAllPupils/{{$term->id}}">Bill Pupils</a>
					@else
					Billed
			      @endif
			  </td>				      
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