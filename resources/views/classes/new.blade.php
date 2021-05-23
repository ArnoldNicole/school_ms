@extends('layouts.app')
@section('content');
<div class="form-panel">
        <form action="/class/new/save" method="post">
          @csrf
         <div class="form-group">
          <h3>New class registration form</h3>       

          <label>Unique class name</label>
          <input type="text" name="classname" value="" placeholder="EG: Class1/2019" class="form-control" minlength="5" maxlength="15">
        </div>

        <div class="form-group">
          <label> Class Year</label>          
          <input type="text" name="classyear" value="<?php echo date("Y"); ?>"  class="form-control" readonly>
        </div>
        <div class="form-group">
          <label>Date Class created</label>
          <input type="date" name="classdate" value=""  class="form-control">
        </div>
        <div class="form-group">
          <label>Class Term One fees</label>
          <input type="number" name="classfees"  class="form-control" min='500' max="3000" maxlength="4" value="">
        </div>
        <div class="form-group">
          <label>Class Term TWo fees</label>
          <input type="number" name="classfees2"  class="form-control" min='500' max="3000" maxlength="4" value="">
        </div>
        <div class="form-group">
          <label>Class Term Three fees</label>
          <input type="number" name="classfees3"  class="form-control" min='500' max="3000" maxlength="4" value="">
        </div>
                <div class="text-center">
                  <button class="btn btn-block btn-primary" name="create_class" type="submit">Finish</button>
                </div>
           </form>
         </div>
       </div>

       @endsection