@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center bg-white">
		<div class="col-md-10">
		<h3 class="text-center font-weight-bold text-info">Fill the form below to create new a term</h3>
		</div>
	</div>
	<div class="row justify-content-center bg-white">
		<form class="cmxform form-horizontal col-md-10 mt-5  style-form" id="commentForm" method="post" action="/saveNewTrem/{{auth()->user()->id}}">
			@csrf
		  <div class="form-group row">
		    <label class="control-label col-md-4" title="Unique Term Date">Unique Term Name </label>
		    <div class="col-md-8 input-group">
		      <input class=" form-control @error('termname') is-invalid @enderror" name="termname" minlength="4"maxlength="15" type="text" value="{{old('termname')}}" required />
		      @error('termname')
					<span class="invalid-feedback alert alert-danger">{{$message}}</span>
		      @enderror
		    </div>
		  </div>
		   <div class="form-group row">
		    <label class="control-label col-md-4">Bill Fees For term </label>
		    <div class="col-md-8 input-group">
		     <select name="term_billable" class="form-control @error('term_billable') is-invalid @enderror">
		     	<option value="1">Term One</option>
		     	<option value="2">Term Two</option>
		     	<option value="3">TermThree</option>
		     </select>
		      @error('term_billable')
					<span class="invalid-feedback alert alert-danger">{{$message}}</span>
		      @enderror
		    </div>
		  </div> 
		  <div class="form-group row">
		    <label for="termyear" class="control-label col-md-4">Term year</label>
		    <div class="col-md-8 input-group">
		      <input type="number" class="form-control @error('termyear') is-invalid @enderror" name="termyear" value="<?php echo date('Y'); ?>" title="Warning: Terms are created only on the current year" readonly />
		      @error('termyear')
					<span class="invalid-feedback alert alert-danger">{{$message}}</span>
		      @enderror
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="startdate" class="control-label col-md-4">Start Date</label>
		    <div class="col-md-8 input-group">
		      <input type="date" class="form-control @error('startdate') is-invalid @enderror" title="Info: Choose the first date of the term"  name="startdate" />
		      @error('startdate')
					<span class="invalid-feedback alert alert-danger">{{$message}}</span>
		      @enderror
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="enddate" class="control-label col-md-4">Term closing Date</label>
		    <div class="col-md-8 input-group">
		      <input class="form-control @error('enddate') is-invalid @enderror" title="Info: Choose the last date of the term: No other term can begin within the period." type="date" name="enddate" value="{{old('enddate')}}" />
		      @error('enddate')
					<span class="invalid-feedback alert alert-danger">{{$message}}</span>
		      @enderror
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-lg-offset-2 col-md-8 input-group">
		      <button class="btn btn-theme ml-5" type="submit" name="save">Save</button>
		      <button class="btn btn-theme04 ml-5" type="reset">Cancel</button>
		    </div>
		  </div>
		</form>
	</div>
</div>


@endsection