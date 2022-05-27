<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html dir="rtl" lang="ar">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <title class="title">عقارات السعودية </title>
    <link rel="shortcut icon" class="link" href="{{asset('myfront/images/kusoglu-logo.png')}}" type="image/x-icon">


    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
    @stack('css')
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link">الرئيسية</a>
          </li>

        </ul>






      </nav>
      <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">

      <span class="brand-text font-weight-light">عقارات السعودية </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item has-treeview @if(request()->routeis('category.manage') || request()->routeis('category.add') || request()->routeis('category.edit')) menu-open @endif  mt-3">
            <a href="" class="nav-link @if(request()->routeis('category.manage') || request()->routeis('category.add')) active @endif ">
              <i class="nav-icon fas fa-network-wired"></i>
              <p>
                 الاقسام
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.manage')}}" class="nav-link @if(request()->routeis('category.manage')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض الاقسام</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.add')}}" class="nav-link @if(request()->routeis('category.add')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة قسم جديد</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview @if(request()->routeis('dashboard.reales.add') || request()->routeis('dashboard.reales.edit') || request()->routeis('dashboard.reales') ) menu-open @endif   mt-3">
            <a href="" class="nav-link @if(request()->routeis('dashboard.reales.add') || request()->routeis('dashboard.reales.edit') || request()->routeis('dashboard.reales') ) active @endif ">
              <i class="nav-icon fas fa-network-wired"></i>
              <p>
                 العقارات
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.reales')}}" class="nav-link @if(request()->routeis('dashboard.reales')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض العقارات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.reales.add')}}" class="nav-link @if(request()->routeis('dashboard.reales.add')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة عقار جديد</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview @if(request()->routeis('dashboard.users')  ) menu-open @endif   mt-3">
            <a href="" class="nav-link @if(request()->routeis('dashboard.users')  ) active @endif ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                 المستخدمون
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.users')}}" class="nav-link @if(request()->routeis('dashboard.reales')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض المسخدمون</p>
                </a>
              </li>

            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">


      <div class="container-fluid">

       @yield('content')



      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<script>
  $(document).ready(function(){

  });
  </script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
    var i = 0;
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('df27f43402a4858b2483', {
      cluster: 'ap2',
      authEndpoint: "/broadcasting/auth"
    });

    var channel = pusher.subscribe('private-App.Models.User.{{Auth::id()}}');
    channel.bind('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', function(data) {
    //  alert(data.title);

      $('.badge').removeClass('d-none');
     //var count = $('.badge').text();
     // $('.badge').html(1 + Number(count) );
      $('.badge').html(function() {
             return (1 + Number($('.badge').text()));
           });

      $('.title').prepend('هناك طلب!!');



      $('.notify').prepend("<a href='" +data.action+ "'class='dropdown-item notification'>" + data.title + "<p>"+ data.body +"</p>" +"<span class='text-secondary'>"+data.created_at+"</span>" + "</a> <hr>" )
      $('.toast').toast('show');
      $('.toast-body').append( "<p>"+ data.body +"</p>");

      const audio = new Audio("{{asset('not.mp3')}}");
       audio.play();
    });


  </script>

  @stack('js')
</body>
</html>
