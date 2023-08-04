<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="icon" href="{{('/backend/dist/img/favicon.ico')}}" type="image/x-icon">

<!-- End Datatables -->
<!-- Toster and Sweet Alert -->
<!-- <link rel="stylesheet" type="text/css" href="{{asset('backend/css/toastr.css')}}"> -->
<!-- End Toaster and Sweet Alert-->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light"  >
    <!-- Left navbar links -->
    <ul class="navbar-nav " >
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/home') }}" class="nav-link">Home</a>
      </li>
    </ul>
    @if (Auth::user()->role == 'Doctor')
    <ul class="nav-item">
      <li class="navbar-nav bg-green"> <b><i>{{ Auth::user()->facility_serve }} - {{ Auth::user()->role }}</i></b></li>
    </ul>
    @endif
    @if (Auth::user()->role == 'LabTechnician')
    <ul class="nav-item">
      <li class="navbar-nav bg-green"> <b><i>{{ Auth::user()->facility_serve }} - {{ Auth::user()->role }}</i></b></li>
    </ul>
    @endif
    @if (Auth::user()->role == 'Admin')
    <ul class="nav-item">
      <li class="navbar-nav bg-green"> <b><i>{{ Auth::user()->role }}</i></b></li>
    </ul>
    @endif
    @if (Auth::user()->role == 'Blood Bank Manager')
    <ul class="nav-item">
      <li class="navbar-nav bg-green"> <b><i>{{ Auth::user()->role }}</i></b></li>
    </ul>
    @endif
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Blood Bank Manager')
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{$pendingCount}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">Notifications</span>
          <div class="dropdown-divider"></div>
      
          <div class="dropdown-divider"></div>
          <a href="{{url ('/blood_requests')}}" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> You have {{$pendingCount}} New Requests
            <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      
    </ul>
    @endif
  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  @include('backend.layouts.sidebar')

  <!-- End Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> <br>
    <!-- Main content -->
    <div class="content ">
      <div class="container-fluid">
      @include('backend.flash-message')

      @yield('content')
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>
  <!-- Main Footer -->
  @include('backend.layouts.footer')
  
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>


<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset('backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{ asset('backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Datatables -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>


<!-- End Datatables -->
     <script>
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
<script src="{{ asset('backend/js/toastr.min.js')}}"></script>
<script src="{{ asset('backend/js/sweetalert.min.js') }}"></script>

@if( Session::has('message') )
<script>
  toastr.success("{{ Session::get('message') }}")
</script>
@endif
<!-- End  Sweet Alert and Toaster notifications -->


</body>
</html>
