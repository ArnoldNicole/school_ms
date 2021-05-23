
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <title>Home</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
  {{-- <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css' ) }}" rel="stylesheet"> --}}
  <link href="{{ asset('css/app.css' ) }}" rel="stylesheet">
   <link href="{{ asset('css/animate.css' ) }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css' ) }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/zabuto_calendar.css' ) }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/gritter/css/jquery.gritter.css' ) }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css' ) }}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css' ) }}" rel="stylesheet">
  <script src="{{ asset('lib/chart-master/Chart.js' ) }}"></script>
  @yield('additional-links')
  </head>

<body id="dashboardpage">
  <section id="container">
    <!-- **
        TOP BAR CONTENT & NOTIFICATIONS
        ****************** -->
    <!--header start-->
  <header class="header bg-dark row justify-content-center w-100 pl-0 pr-0 ml-0 mr-0">
  <div class="col-md-3">
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="/home" class="logo"><b>ELEAR<span>NER1</span></b></a>
  </div>


  <div class="col-md-7">
    
    <form action="" class="row justify-content-md-between mt-1 logo ">
      <div class="col-md-9">
        <input type="text" id="pupil" name="pupil" class="form-control mt-2" required="">
      </div>
      <div class="col-md-3">
        <i class="fa fa-search input-group-addon text-white"></i>
        <p for="pupil" class="text-white font-weight-bold"> FindPupil</p>
      </div>
    </form>
  </div>
  <div class="col-md-2">
    <a class="btn btn-sm btn-outline-primary float-right btn-block mt-3" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
  </div>



   <!--logo end-->
 
      
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="{{asset('img/manu.png')}}" class="rounded-circle img-fluid img-thumbnail" width="80"></a></p>
          <h5 class="centered"><{{auth()->user()->name}}</h5>
          <li class="mt">
            <a href="#" id="dashboard" class="{{ (request()->is('home')) ? 'active' : '' }}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" id="pupils" class="@if(request()->is('pupil*')) active @endif">
              <i class="fa fa-user"></i>
              <span>PUPILS</span>
              </a>
            <ul class="sub">
              <li><a href="/pupil/newPupil" class="@if(request()->is('pupil/newPupil')) active @endif">Register New</a></li>              
              <li><a href="/pupil/SuspensionForm">Suspension</a></li>
              <li><a href="/pupil/views">View all</a></li>
              <li><a href="/pupil/psd">Pupil subjects Details</a></li>             
              <li><a href="/pupil/images">Portraits</a></li>
            </ul>
          </li>          
          <li class="sub-menu">
            <a href="javascript:;" class="@if(request()->is('class*')) active @endif">
              <i class="fa fa-building-o"></i>
              <span>THE CLASSES</span>
              </a>
            <ul class="sub">
              <li><a href="/class/new">Add New Class</a></li>
              <li><a href="/class/viewclasses">View registered classes</a></li>
              <li><a href="/classlists">View Class Lists</a></li>
              <li><a href="/highlights">Class Highlights</a></li>
           </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="@if(request()->is('teacher*')) active @endif">
              <i class="fa fa-users"></i>
              <span>TEACHERS</span>
              </a>
            <ul class="sub">
              <li><a href="/newteacher">New</a></li>
              <li><a href="/updateteacher">Update Records</a></li>
              <li><a href="/teachers">Registred teachers</a></li>
              <li><a href="/actiononteacher">Actions</a></li>              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="@if(request()->is('parent*')) active @endif">
              <i class="fa fa-list-alt"></i>
              <span>PARENTS</span>
              </a>
            <ul class="sub">
              <li><a href="/parents/editparent">New Parent records</a></li>
              <li><a href="/parents/parentcontact">Address book</a></li>
              <li><a href="/parents/viewAllParents">View all</a></li>              
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="@if(request()->is('term*')) active @endif">
              <i class="fa fa-dedent"></i>
              <span>TERMS</span>
              </a>
            <ul class="sub">
              <li><a href="/newterm">New Term</a></li>
              <li><a href="/termdates">Create important term dates</a></li>
              <li><a href="/terms">View all Terms</a></li>

            </ul>
          </li>
        
          <li class="sub-menu">
            <a href="javascript:;" class="@if(request()->is('subjects*')) active @endif">
              <i class="fa fa-book"></i>
              <span>SUBJECTS</span>
              </a>
            <ul class="sub">
              <li><a href="/New_subject">New</a></li>
              <li><a href="/subjectHighlights.php">Subject Details</a></li>
              <li><a href="/removeSubject">Remove from curriculum</a></li>
              <li><a href="/modifySubjects">Modify Subjects</a></li>
            </ul>
          </li>

           <li class="sub-menu">
            <a href="javascript:;" class="@if(request()->is('fees*')) active @endif">
              <i class="fa fa-money"></i>
              <span>FEES DESK</span>
              </a>
            <ul class="sub">
              <li><a href="/payfee">Pay fees</a></li>
              <li><a href="/transactions">Payments history</a></li>
              <li><a href="/balances">Fee Balances Reports</a></li>
              <li><a href="/extrapayments">Extra payments</a></li>
            </ul>
         </li>

      <li class="sub-menu">
            <a href="javascript:;" class="@if(request()->is('exam*')) active @endif">
              <i class="fa fa-money"></i>
              <span>EXAMS</span>
              </a>
            <ul class="sub">
              <li><a href="/exams/uploadMarklist">Upload Marklist</a></li>
              <li><a href="/exams/ViewExamRecords">View Results</a></li>              
            </ul>
          </li>

          
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height" id="app">
        <hr class="dropdown-divider">
        <div class="row justify-content-center mt-2">
          <div class="col-md-12" id="pupil_list">
            
          </div>
        </div>
        @yield('content')
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>ELEARNER-1</strong>. All Rights Reserved
        </p>
        <div class="credits">
          
          System managed by<a href="https://arnoldwamae.simplesite.com">EnDablew</a>
        </div>
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
          <p>2018-<?php echo date("Y"); ?> </p>
      </div>
</footer>
    <!--footer end-->
  </section>
  @yield('scripts')
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('js/jquery3.1.js')}}"></script>
  {{-- <script src="{{asset('js/app.js')}}"></script> --}}
  {{-- <script type="text/javascript" language="javascript" src="{{asset('lib/advanced-datatable/js/jquery.js')}}"></script> --}}
  <script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>  
  <script src="{{asset('lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>

  <!--common script for all pages-->
  <script src="{{asset('lib/common-scripts.js')}}"></script>
@yield('scripts')
 <script src="{{ asset('lib/gritter/js/jquery.gritter.js' ) }}"></script> 
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome {{auth()->user()->name}}',
        // (string | mandatory) the text inside the notification
        text: 'Welcome {{auth()->user()->name}}',
        // (string | optional) the image to display on the left
        image: '{{asset('img/manu.png')}}',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>

  <script type="text/javascript">
                // jQuery wait till the page is fullt loaded
                $(document).ready(function () {
                    // keyup function looks at the keys typed on the search box
                    $('#pupil').on('keyup',function() {
                        // the text typed in the input field is assigned to a variable 
                        var query = $(this).val();
                        // call to an ajax function
                        $.ajax({
                            // assign a controller function to perform search action - route name is search
                            url:"{{ url('/findpupil') }}",
                            // since we are getting data methos is assigned as GET
                            type:"GET",
                            // data are sent the server
                            data:{'pupil':query},
                            // if search is succcessfully done, this callback function is called
                            success:function (data) {
                                // print the search results in the div called country_list(id)
                                $('#pupil_list').html(data);
                            }
                        })
                        // end of ajax call
                    });

                    // initiate a click function on each search result
                    $(document).on('click', 'li', function(){
                        // declare the value in the input field to a variable
                        var value = $(this).text();
                        // assign the value to the search box
                        $('#pupil').val(value);
                        // after click is done, search results segment is made empty
                        $('#pupil_list').html("");
                    });
                });
            </script>
</body>

</html>
