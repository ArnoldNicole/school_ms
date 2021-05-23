@extends('layouts.app')
@section('content');
<div class="form-panel">
        <form action="/class/new/edit/{{$class->id}}" method="post">
          @csrf
          @method('PATCH')
         <div class="form-group">
          <h3>Class Edit Form</h3>       

          <label>Unique class name</label>
          <input type="text" name="classname" value="{{ old('classname') ?? $class->classname }}" class="form-control @error('classname') is-invalid @enderror" minlength="5">
          @error('classname')
         
            <span class="text-danger alert-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label> Class Year</label>          
          <input type="text" name="classyear" value="{{ old('classyear') ?? $class->classyear }}"  class="form-control @error('classyear') is-invalid @enderror" readonly>
          @error('classyear')
                   
                      <span class="text-danger alert-danger">{{$message}}</span>
                    @enderror
        </div>
        <div class="form-group">
          <label>Date Class created</label>
          <input type="date" name="classdate" value="{{ old('classdate') ?? $class->classdate }}"  class="form-control @error('classdate') is-invalid @enderror">
          @error('classdate')
                   
                      <span class="text-danger alert-danger">{{$message}}</span>
                    @enderror
        </div>
        <div class="form-group">
          <label>Class Term One fees</label>
          <input type="number" name="classfees"  class="form-control @error('classfees') is-invalid @enderror" min='500' max="3000" maxlength="4" value="{{ old('classfees') ?? $class->classfees }}">
          @error('classfees')
                   
                      <span class="text-danger alert-danger">{{$message}}</span>
                    @enderror
        </div>
        <div class="form-group">
          <label>Class Term TWo fees</label>
          <input type="number" name="classfees2"  class="form-control @error('classfees2') is-invalid @enderror" min='500' max="3000" maxlength="4" value="{{ old('classfees2') ?? $class->classfees2 }}">
          @error('classfees2')
                   
                      <span class="text-danger alert-danger">{{$message}}</span>
                    @enderror
        </div>
        <div class="form-group">
          <label>Class Term Three fees</label>
          <input type="number" name="classfees3"  class="form-control @error('classfees3') is-invalid @enderror" min='500' max="3000" maxlength="4" value="{{ old('classfees3') ?? $class->classfees3 }}">
          @error('classfees3')
                   
                      <span class="text-danger alert-danger">{{$message}}</span>
                    @enderror
        </div>
                <div class="text-center">
                  <button class="btn btn-block btn-primary" type="submit">Finish</button>
                </div>
           </form>
         </div>
       </div>

       @endsection