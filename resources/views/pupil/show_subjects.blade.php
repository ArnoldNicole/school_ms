@extends('layouts.app')
@section('content')
<a href="editsubject.php" title=""> <button class="btn btn-link" type="button">Add subject</button></a>
       <h3><i class="fa fa-book"></i> Pupils Database.</h3>
       <div class="row mb">
         <!-- page start-->
         <div class="content-panel">
           <div class="adv-table">
             <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
               <thead>
                 <tr>
                   <th>Full Names</th>
                   <th>Adm No.</th>
                   <th><i class="fa fa-check"></i></th>
                   <th><i class="fa fa-check"></i></th>
                   <th><i class="fa fa-check"></i></th>
                   <th><i class="fa fa-check"></i></th>
                   <th><i class="fa fa-check"></i></th>
                   <th><i class="fa fa-check"></i></th>
                   <th><i class="fa fa-check"></i></th>
                  <th><i class="fa fa-check"></i></th>
                 </tr>
                 <!--fullname admno upino classadmittedto gender status -->
               </thead>
               <tbody>
                 @foreach($pupils as $pupil)
                 <tr class="gradeX">
                   <td>{{$pupil->pupil->fullname}}</td>
                   <td>{{$pupil->pupil->registration_number}}</td>
                   <td>{{$pupil->English}}</td>
                   <td>{{$pupil->Kiswahili}}</td>
                   <td>{{$pupil->Maths}}</td>
                   <td>{{$pupil->SocialStudies}}</td>
                   <td>{{$pupil->Science}}</td>
                   <td>{{$pupil->ReligiousEducation}}</td>
                   <td>{{$pupil->optional}}</td>
                   <td><a href="/PupilSubjectsEdit/{{$pupil->id}}" class="btn  btn-sm btn-outline-dark">Edit Subjects</a></td>
                 </tr>  
                 @endforeach                
               </tbody>
             </table>
           </div>
         </div>
         <!-- page end-->
       </div>
       <!-- /row -->
@endsection