@extends('layouts.app')
 @section('additional-links') 
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
 @endsection
@section('content');
<h3><i class="fa fa-book"></i> The Classes Database.</h3>
        <div class="row justify-content-center">
          <!-- page start-->
             <div class="col-md-10">
              <div class="content-panel">
                <div class="adv-table">
               <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info" id="example">
                 <thead>
                   <tr>
                    
                     <th>Code</th>
                     <th>Prefect</th>
                     <th>Class Teacher</th>
                     <th>ClassTeacher Name</th>
                     <th>Year</th>
                     <th></th>                    
                   </tr>
                  
                 </thead>
                 <tbody>                 
                   @foreach($classes as $class)
                   <tr class="gradeX">                   
                     <td>{{$class->classname}}</td>
                     <td>Null</td>
                     <td>Null</td>
                     <td>Null</td>
                     <td>{{$class->classyear}}</td>
                     <td><a href="/classes/edit/{{$class->id}}">Edit</a></td>
                   </tr>  
                   @endforeach                               
                 </tbody>
               </table>
               </div>
             </div>
             </div>
            </div>
         
          <!-- page end-->
          
        
        <!-- /row -->
        @endsection

@section('scripts')
 <script src="{{asset('js/jquery3.1.js')}}"></script>
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