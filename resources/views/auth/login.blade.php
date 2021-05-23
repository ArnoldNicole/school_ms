@extends('layouts.auth')

@section('content')
<div class="container">
   <form class="form-login w-50" action="{{ route('login') }}" method="POST">
             <h3 class="alert-success text-center" >Admin Login</h3>
     <h2 class="form-login-heading">sign in to proceed to system</h2>
     <div class="login-wrap">
       <div class="input-group">
         <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>          
       <input type="email" autocomplete="off"  class="form-control  @error('email') is-invalid @enderror " value="{{ old('email') }}" placeholder="Admin Email" name="email" required>

       </div>
       @error('email')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
       <br>
       @csrf
       <div class="input-group">
         <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
       <input type="password" name="password" class="form-control" placeholder="Password" id="key" autocomplete="off" required>  <span onclick=";look()" title="Show Password" class="input-group-addon"><i class="fa fa-eye" ></i></span>       
     </div>
     
      <br>
       <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
       <hr>
       
       <div class="registration">
        Register Instead<br/>
         <a class="" href="{{ route('register') }}">
           Register
           </a>
       </div>
     </div>
          
   </form>
 </div>
@endsection
