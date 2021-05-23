@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="container">
           <form class="form-login" action="{{ route('register') }}" method="POST">
            <h3 class="alert-success text-center" >Admin Registration</h3>
             <h2 class="form-login-heading">Register to use System</h2>
             <div class="login-wrap">
                   @csrf

                   <div class="form-group row">
                       <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                       <div class="col-md-6">
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                           @error('name')
                               <span class="invalid-feedback alert-danger" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                       <div class="col-md-6">
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                           @error('email')
                               <span class="invalid-feedback alert-danger" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                       <div class="col-md-6">
                           <input id="email" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off">

                           @error('username')
                               <span class="invalid-feedback alert-danger" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
               
                       <div class="col-md-6">
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                           @error('password')
                               <span class="invalid-feedback alert-danger" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                       <div class="col-md-6">
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                       </div>
                   </div>

                   <div class="form-group row mb-0">
                       <div class="col-md-12 text-center offset-md-4">
                           <button type="submit" class="btn btn-primary">
                               {{ __('Register') }}
                           </button>
                       </div>
                   </div>

                   <div class="form-group row justify-content-center">
                   <div class="col-md-12 text-center">
                     Opting to Login Instead<br/>
                      <a class="" href="{{ route('login') }}">
                        LOGIN HERE
                        </a>
                   </div>
                   </div>
                   
               </form>
            
         
         </div>

    </div>
</div>
@endsection