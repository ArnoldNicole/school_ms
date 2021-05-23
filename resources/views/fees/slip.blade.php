@extends('layouts.app')
@section('content')


	<div class="row justify-content-center" id="printing">
		<div class="col-md-9">
			<a href="/pupil/Detailed/{{$transaction->pupil_id}}" class="btn btn-outline-primary btn-block">Back to Profile</a>
		</div>
	</div>

	<div class="row justify-content-center" id="ExportContent">
		<div class="col-md-5 card-body">
			<div class="row bg-dark justify-content-center">
				<span class="text-center"><h4 class="text-white font-weight-bold">{{$transaction->pupil->fullname}} payment Slip</h4></span>
			</div> 
			<div class="row bg-white">
				   <div class="col-md-12">
				   	    <p class="text-dark font-weight-bold">PUPIL NUMBER: <span class="text-success float-right font-weight-bold">{{$transaction->registration_number}}</span></p>
				   		<p class="text-dark font-weight-bold">TRANSACTION ID: <span class="text-success float-right font-weight-bold">{{$transaction->id}}</span></p>
				   		<p class="text-dark font-weight-bold">RECEIPT NO: <span class="text-success float-right font-weight-bold">{{$transaction->receipt_number}}</span></p>
				   		<p class="text-dark font-weight-bold">TRANSACTION DATE: <span class="text-success float-right font-weight-bold">{{$transaction->created_at}}</span></p>
				   		<p class="text-dark font-weight-bold">RECEIVED TO BANK ON: <span class="text-success float-right font-weight-bold">{{$transaction->date_banked}}</span></p>
				   		<p class="text-dark font-weight-bold">BANK PAID: <span class="text-success float-right font-weight-bold">{{$transaction->banking_agent}}</span></p>
				   		<p class="text-dark font-weight-bold">RECEIVED ON: <span class="text-success float-right font-weight-bold">{{$transaction->date_of_payments}}</span></p>
				   		<p class="text-dark font-weight-bold mb-0 pb-0">AMOUNT RECEIVED: <span class="text-success float-right font-weight-bold">{{$transaction->amount_Paid}}</span></p><br>
				   		<span>==============================================</span>
				   		<br>
				   		<span class="font-italic text-sm-right">You were served by{{$transaction->name}}</span>
				   		<hr>
				   		<p class="text-dark font-weight-bold">OUTSTANDING BALANCE: <span class="text-success float-right font-weight-bold">{{$transaction->pupil->balance->balance}}</span></p>
				   </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<button class="btn btn-block btn-outline-secondary" id="btnExport" onclick="Export();"><i class="fa hidden-print fa-print"></i></button>
		</div>
		<div class="col-md-4">
			<a href="/" class="btn btn-block btn-outline-primary"><i class="fa hidden-print fa-home"></i></a>
		</div>
		<div class="col-md-4">
			<a href="/pupil/Detailed/{{$transaction->pupil_id}}" class="btn btn-block btn-outline-success"><i class="fa hidden-print fa-user"></i></a>
		</div>

	</div>


@endsection


@section('scripts')
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
                     pdfMake.createPdf(docDefinition).download("PaymentSlip-{{$transaction->pupil->fullname}}-{{$transaction->registration_number}}");
                 }
             });
         }
     </script>
 
 @endsection