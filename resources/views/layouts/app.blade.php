<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Base Project') }}</title>

    <!-- Styles -->
     <!-- Bootstrap 3.3.7 -->
     <link rel="stylesheet" href="{{ asset('css/toogle.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}" >
<!-- fullCalendar -->
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" >
<link rel="stylesheet" media="print" href="{{ asset('adminlte/bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" >
 

  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" >
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}" >
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('css/script.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- jQuery 3 -->
      <script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{ asset('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
      <script src="{{ asset('js/jquery-1.9.1.js')}}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js')}}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Scripts -->
<script src="{{ asset('js/script.js')}}"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body  class="hold-transition skin-blue sidebar-mini">
              
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->

    <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{ config('app.name', 'Laravel') }}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="nav navbar-nav navbar-custom-menu">
        <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                         <li class="">
                                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                     Login Sebagai <span class="caret"></span>
                                  </a>
                                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                                          @foreach($groups as $row)
                                                <li>
                                                  <a href="{{url('/switchrole/'.$row->id)}}" style="color: #000000;">
                                                      {{$row->name}}
                                                      <?php if ($group_id == $row->id): ?>
                                                          <i class="fa fa-check-circle" style="margin-left: 10px;"></i>
                                                      <?php endif ?>
                                                  </a>
                                                </li>
                                          @endforeach
                                  </ul>
                              </li>
                            <li>
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endif
                      <!--  -->
                      <li>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                      </li>
                    </ul>
      </div>
    </nav>
    </header>
 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- search form -->
<ul class="sidebar-menu" data-widget="tree">
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"> </i>
          <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angel-left pull-right"></i>
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class=""> </i>
          <span>Staf</span>
          <span class="pull-right-container">
            <i class="fa fa-angel-left pull-right"></i>
          </span>
        </a>
      </li>
        <li>
          <a href="#">
          <i class=""> </i>
          <span>Proyek</span>
          <span class="pull-right-container">
            <i class="fa fa-angel-left pull-right"></i>
          </span>
        </a>
        </li>
        </ul>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
     
    </section>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
        @if (session()->has('flash_message'))
            <div class="container">
                <div class="alert alert-success col-md-11">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('flash_message') }}
                </div>
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="container">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('error_message') }}
                </div>
            </div>
        @endif

        @if(session()->has('sukses'))
          <div class="row">
            <div class="alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
              </button>
              <strong>Notifikasi</strong> {{session()->get('notif')}}
            </div>

          </div>

        @endif


        @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="https://profio.co.id">Profio Teknova Indoensia</a></strong>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
      <!-- Bootstrap 3.3.7 -->
      <script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
      <!-- Morris.js charts -->
      <script src="{{ asset('adminlte/bower_components/raphael/raphael.min.js')}}"></script>
      <script src="{{ asset('adminlte/bower_components/morris.js/morris.min.js')}}"></script>
      <!-- jQuery Knob Chart -->
      <!-- daterangepicker -->
      <script src="{{ asset('adminlte/bower_components/moment/min/moment.min.js')}}"></script>
      <script src="{{ asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
      <!-- datepicker -->
      <script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
      <!-- Slimscroll -->
      <script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
      <!-- AdminLTE{{(' asset dashboard demo (This is only for')}} demo purposes) -->
      <script src="{{ asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>
      <!-- select2 -->
      <script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.min.js') }}">
      </script>
<!-- fullCalendar -->
<script src="{{ asset('adminlte/bower_components/moment/moment.js')}}"></script>
<script src="{{ asset('adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
     <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> 
</body>
</html>
