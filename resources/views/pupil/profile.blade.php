@extends('layouts.app')
@section('additional-links')
 
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
 @endsection
@section('content')
<div class="container-fluid wrapper">
	<div class="row justify-content-center">
<div class="col-md-9">
	<h3 class="text-center 	text-white ">{{$pupil->fullname}} ACADEMIC PROFILE</h3>
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

</div>
</div>
    <div class="row">
    	<div class="col-md-3">
    		
    		    <img src="{{asset('storage/'.$pupil->passport->photo)}}" class="rounded-circle w-100 img-thumbnail img-fluid"  alt="Pupil Photo">
    		
    	</div>   
        <div class="col-9 pt-5">
          <div class="d-flex justify-content-between align-items-baseline">
        <div class="d-flex align-items-center pb-3">
            <div class="h4"></div>   
               <a href="/" class="ml-5 btn btn-info">Exams</a>    
        </div>         
           
             <a href="/pupil/AddPassportSizedPhoto/{{$pupil->id}}" class="ml-5 btn btn-info">Add Passport Photo</a> 
                               
            </div> 
            
            
            
        <div class="d-flex">
            <div class="pr-5"><strong></strong> Total Exams</div>
            <div class="pr-5"><strong></strong> Terms</div>
            <div class="pr-5"><strong></strong> Suspensions</div>
        </div>  
        <div class="pt-4 font-weight-bold">Pupil Name : {{$pupil->fullname}}</div>
        <div class="pt-2 font-weight-bold">Pupil Class : {{$pupil->classes->first()->classname}}</div> 
        <div class="pt-2 font-weight-bold">D.O.B : {{$pupil->date_of_birth}}</div>
    </div>
</div>
<div class="row mb-1 mt-1 ">
	<div class="col-md-3" style="border-radius: 50px;">
		<a href="/fees/payfees/{{$pupil->id}}" class="btn btn-outline-danger  btn-block float-right" 
			>Pay Fees</a>
	</div>
	<div class="col-md-9">
		<a href="#" class="text-dark rounded text-center font-weight-bold  btn btn-block btn-success">Current Balance: Ksh {{$pupil->payments->sum('Expected')-$pupil->payments->sum('amount_Paid')}} </a>
	</div>
</div>
	<div class="row justify-content-center bg-white">
		<div class="col-md-4">
			<div class="card mt-3">
			<div class="card-header bg-dark text-white font-weight-bold">{{$pupil->fullname}}</div>
			<div class="card-body">
				<p><span class="font-weight-bold text-dark">ADM NO:</span> {{$pupil->registration_number}}</p>
				<p><span class="font-weight-bold text-dark">UPI NO:</span> {{$pupil->upi_number}}</p>
				<p><span class="font-weight-bold text-dark">GENDER:</span> {{$pupil->gender}}</p>
				@foreach($pupil->classes as $class)
					<p><span class="font-weight-bold text-dark">CLASS: </span>{{$class->classname}}</p>
					<p><span class="font-weight-bold text-dark">YEAR: </span>{{$class->classyear}}</p>
				@endforeach
			</div>
		</div>
		</div>
		<div class="col-md-7 float-right">
			<div class="card mt-3">
			<div class="card-header bg-danger text-white font-weight-bold">{{$pupil->fullname}} Subjects</div>
			<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<ul class="list-inline m-1 p-1">
						<li class="list-inline-item"> <i class="fa fa-check text-success"></i> <p> {{$subjects->English}}</p></li>
						<li class="list-inline-item"> <i class="fa fa-check text-success"></i> <p> {{$subjects->Maths}}</p></li>
						<li class="list-inline-item"> <i class="fa fa-check text-success"></i> <p> {{$subjects->Kiswahili}}</p></li>
						
					{{-- </ul>
					
				</div>
				<div class="col-md-6">
					<ul class="list-inline m-1 p-1">
 --}}					<li class="list-inline-item"> <i class="fa fa-check text-success"></i> <p>{{$subjects->SocialStudies}}</p></li>
					<li class="list-inline-item"> <i class="fa fa-check text-success"></i> <p>{{$subjects->Science}}</p></li>
					<li class="list-inline-item"> <i class="fa fa-check text-success"></i> <p>{{$subjects->ReligiousEducation}}</p></li>
					<li class="list-inline-item"> <i class="fa fa-check text-success"></i> <p>{{$subjects->optional}}</p></li>
				</ul>
				</div>
			</div>			
				
			</div>
		</div>
		</div>
	</div>
	<div class="row container-fluid mt-2">
		<div class="col-md-12">
			<a href="/parents/parent_records/{{$pupil->id}}" class="btn btn-block  mb-1 btn-outline-info text-white font-weight-bold">Edit Pupil`s Parents</a>
			@if($parents->count()==0)
			<h4>Parents Info is missing</h4>
			<p>If the pupil`s parent are new<a href="/parents/editparent"> add them here</a>. If the parent exists add them to pupil <a href="/parents/parent_records/{{$pupil->id}}">Here</a></p>
			@endif
		</div>
	</div>
	<div class="row justify-content-center">
		@foreach($parents as $parent)
		<div class="col-md-6">
			<div class="card">
				<div class="card-header bg-success text-white font-weight-bold">{{$parent->parent_type}}
					<a href="/parents/profile/{{$parent->id}}" class="card-link float-right btn tbn-primary">Profile</a></div>
				<div class="card-body">
					<p><span class="text-dark font-weight-bold">Mail:</span> <a href="mailto:{{$parent->email}}" target="_blank">{{$parent->email}}</a></p>
					<p><span class="text-dark font-weight-bold">Tel:</span> <a href="tel:+254{{$parent->phone1}}" target="_blank">+254{{$parent->phone1}}</a></p>
					<p><span class="text-dark font-weight-bold">Adress:</span> {{$parent->location}}</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<h4 class="text-center text-info font-weight-bold h4 float-left ml-5">FEES PAYMENTS REPORT</h4>
		</div>
		<div class="col-md-6">
			<a href="#" class="btn btn-outline-danger btn-block float-right" id="btnExport" onclick="Export();">
				Download Fees Statement
			</a>
		</div>
	</div>
	<div class="dropdown-divider"></div>
	<div id="ExportContent">
	<div class="row justify-content-center bg-white">	
			<div class="col-md-12">
				<table class="table bg-white table-bordered dt-responsive" id="example">
				  <thead>
				    <tr>			      
				     
				      <th>Ref No:</th>
				      <th>Reference</th>
				      <th>Paid on</th>
				      <th>Posted on</th>
				      <th>Amount Paid</th>				      		      
				      <th>Amount Expected</th>
				      <th>Received</th>
				      <th></th>
				    </tr>
				    <!--fullname admno upino classadmittedto gender status -->
				  </thead>
				  <tbody>
				    @foreach($pupil->payments as $balance)
				    <tr class="gradeX">
				      
				      
				      <td>{{$balance->receipt_number }}</td>
				      <td>{{$balance->banking_agent }}</td>
				      <td>{{$balance->date_banked }}</td>
				      <td>{{$balance->date_of_payments }}</td>
				      <td>{{$balance->amount_Paid }}</td>				      
				      <td>{{$balance->Expected }}</td>
				      <td>{{$balance->created_at->diffForHumans() }}</td>
				      <td><a href="/pupilGenerateSlip/{{$balance->id}}" class="btn btn-outline-success btn-sm">Get Slip</a></td>
				    </tr>  
				    @endforeach
				                  
				  </tbody>
				</table>
			</div>			
		</div>

		<div class="row justify-content-center bg-white">
			<div class="col-md-8">	

					<div class="d-md-inline-flex">
						<p class="mr-5 ml-5"><span class="font-weight-bold text-dark">Total Paid :</span> {{$pupil->payments->sum('amount_Paid')}}</p>
					      
					<p class="mr-5 ml-5"><span class="font-weight-bold text-dark">Total Expected :</span> {{$pupil->payments->sum('Expected')}}</p>
					<p class="mr-5 ml-5"><span class="font-weight-bold text-dark">Balance:</span> {{$pupil->payments->sum('Expected')-$pupil->payments->sum('amount_Paid')}}</p>
					</div>
					
				
			</div>
			<div class="col-md-4">
				<p>Generated: {{Carbon\Carbon::now()->toDateTimeString()}}</p>
			</div>
		</div>
	</div>

		<div class="row justify-content-center bg-white">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-dark">
						<span class="">BILLINGS</span>
					</div>
					<div class="card-body">
						{{-- <billing></billing> --}}
						<h3 class="h3 font-weight-bold">Billed Terms: {{$pupil->term->count()}}</h3>
						<div class="row justify-content-center">
							<div class="col-md-12">
								<h3 class="h3 text-center font-weight-bold text-dark">Terms Available for Billing</h3>
								@foreach($terms as $term)
									@if($pupil->term->contains($term->id))
										<span></span>
									@else
									<div class="row justify-content-center bg-white">
										<div class="col-md-4">
										<div>
										<p class="p-0">Term Name: <span class="text-success">{{$term->termname}}</span>	</p>
										<p>Term status: Unbilled for <span class="text-success">{{$pupil->fullname}}</span></p>
										</div>
									</div>
									<div class="col-md-4">								
										<form action="/unbilledPupilBillingService/{{$term->id}}/{{$pupil->id}}" method="POST">
											@csrf
											<button type="submit" class="btn btn-success btn-block">Bill for {{$term->termname}}</button>
										</form>
									</div>
									</div>
										
									@endif
								@endforeach	
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</div>	
</div>
@endsection

@section('scripts')
 <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
 <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('js/responsive.bootstrap4.min.js')}}"></script>
 <script src="{{asset('js/pdfmake.min.js')}}"></script>
 <script src="{{asset('js/html2canvas.min.js')}}"></script>
 <script type="text/javascript">
         function Export() {
             html2canvas(document.getElementById('ExportContent'), {
                 onrendered: function (canvas) {
                     var data = canvas.toDataURL();
                     var docDefinition = {
                         content: [{
                             image: data,
                             width: 500
                         }]
                     };
                     pdfMake.createPdf(docDefinition).download("FeesReportFor-{{$pupil->fullname}}");
                 }
             });
         }
     </script>

 <script>
 $(document).ready(function(){
  $('#example').DataTable();
 });
</script>
 @endsection