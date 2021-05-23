 @extends('layouts.app')
 @section('additional-links')
 
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
 @endsection
 @section('content')
 <div class="wrapper">
   <div class="row container-fluid">
     <h3><i class="fa fa-book"></i> Pupils Database.</h3>
            <div class="row mb">
              <!-- page start-->
              <div class="content-panel">
                <div class="adv-table">
                  <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered dt-responsive" id="example">
                    <thead>
                      <tr>
                        <th>Full Names</th>
                        <th>Admission number</th>
                        <th>UPI Number</th>
                        <th>Admitted to Class</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      <!--fullname admno upino classadmittedto gender status -->
                    </thead>
                    <tbody>
                      @foreach($pupils as $pupil)
                      <tr class="gradeX">
                        <td>{{$pupil->fullname }}</td>
                        <td>{{$pupil->registration_number }}</td>
                        <td>{{$pupil->upi_number }}</td>
                        <td>Pending</td>
                        <td>Pending</td>
                        <td>Pending</td>
                        <td><a href="/pupil/editpupil/{{$pupil->id}}" class="btn btn-info">Edit</a></td>                        
                        <td><a href="/pupil/Detailed/{{$pupil->id}}" class="btn btn-primary">Profile</a></td>
                        <td><a href="/parents/parent_records/{{$pupil->id}}" class="btn btn-success">Parent</a></td>
                      </tr> 
                      @endforeach 
                                     
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- page end-->
            </div>
            <!-- /row -->
   </div>
 </div>
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