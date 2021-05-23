 @extends('layouts.app')
 @section('additional-links')
 <!-- Custom styles for this template -->  
  <link href="{{ asset('lib/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" /> 
  <link rel="stylesheet" href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css') }}" />
  
 @endsection
 @section('content')
 <h3><i class="fa fa-book"></i> Parents Database.</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Full Names</th>
                    <th>National Id number</th>
                    <th>Number of pupils</th>
                    <th>Registerd on</th>
                    <th>Type</th>
                    <th>created</th>
                  </tr>
                  <!--fullname admno upino classadmittedto gender status -->
                </thead>
                <tbody>
                  @foreach($parents as $parent)
                  <tr class="gradeX">
                    <td>{{$parent->parent_fullname }}</td>
                    <td>{{$parent->nationalidno }}</td>
                    <td>{{$parent->pupil->count() }}</td>
                    <td>{{$parent->created_at}}</td>
                    <td>{{$parent->parent_type}}</td>
                    <td>{{$parent->created_at->diffForHumans()}}</td>                    
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

  @section('scripts')
 <script type="text/javascript" language="javascript" src="{{asset('lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
  <script type="text/javascript" src="{{asset('lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
@endsection