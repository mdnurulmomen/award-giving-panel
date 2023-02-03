<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">


  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/dist/css/AdminLTE.min.css')}}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/dist/css/skins/_all-skins.min.css')}}">

  <!-- Toastr Alert -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/toastr.min.css')}}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    
    .table > thead{

      background: #2159A8;
      color:#ffffff;
    }

    label{
      color: #000;
    }



  </style>

  @stack('head')

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>eena</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Meena</b>Award</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <img src="{{ asset('assets/admin/images/profile/'.Auth::guard('admin')->user()->picture) }}" class="user-image" alt="User Image">
              <span class="hidden-xs"><b>{{ Auth::guard('admin')->user()->name }}</b></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('assets/admin/images/profile/'.Auth::guard('admin')->user()->picture) }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::guard('admin')->user()->firstname.' '. Auth::guard('admin')->user()->lastname }} 
                  <small>- Admin </small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('admin.profile.show')}}" class="btn btn-primary btn-flat">Profile</a>
                </div>
                
                <div class="pull-right">
                  <a href="{{route('admin.logout')}}" class="btn btn-primary btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/admin/images/profile/'.Auth::guard('admin')->user()->picture) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::guard('admin')->user()->firstname.' '. Auth::guard('admin')->user()->lastname}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">


        <li class="@if(Route::currentRouteName() == 'admin.home') active @endif">
          <a href="{{ route('admin.home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="@if(Route::currentRouteName() == 'admin.applications.enabled.show' || Route::currentRouteName() == 'admin.applications.filtering.show') active @endif">
          <a href="{{ route('admin.applications.enabled.show') }}">
            <i class="fa fa-paper-plane"></i> <span>Applicantions</span>
          </a>
        </li>

        <li class="treeview @if(Route::currentRouteName() == 'admin.award-settings.show' || Route::currentRouteName() == 'admin.years.enabled.show' || Route::currentRouteName() == 'admin.years.deleted.show') active @endif">
          <a href="#">
            <i class="fa fa-th"></i> <span>Award Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            {{-- 
            <li class="@if(Route::currentRouteName() == 'admin.ages.enabled.show') active @endif">
              <a href="{{route('admin.ages.enabled.show')}}">
                <i class="fa fa-circle-o text-red"></i> Age Variation 
              </a>
            </li>

            <li class="@if(Route::currentRouteName() == 'admin.categories.enabled.show') active @endif">
              <a href="{{route('admin.categories.enabled.show')}}">
                <i class="fa fa-circle-o text-yellow"></i> Category 
              </a>
            </li>

            <li class="@if(Route::currentRouteName() == 'admin.contentTypes.enabled.show') active @endif">
              <a href="{{route('admin.contentTypes.enabled.show')}}">
                <i class="fa fa-circle-o text-aqua"></i> Content Type 
              </a>
            </li>

            <li class="@if(Route::currentRouteName() == 'admin.mediaTypes.enabled.show') active @endif">
              <a href="{{ route('admin.mediaTypes.enabled.show') }}">
                <i class="fa fa-circle-o text-aqua"></i> Media Type 
              </a>
            </li> 
            --}}

            <li class="@if(Route::currentRouteName() == 'admin.award-settings.show') active @endif">
              <a href="{{ route('admin.award-settings.show') }}">
                <i class="fa fa-circle-o text-green"></i> Settings 
              </a>
            </li>

            <li class="@if(Route::currentRouteName() == 'admin.years.enabled.show') active @endif">
              <a href="{{ route('admin.years.enabled.show') }}">
                <i class="fa fa-circle-o text-green"></i> Years 
              </a>
            </li>

          </ul>
        </li>

        <li class="@if(Route::currentRouteName() == 'admin.years.archived' || Route::currentRouteName() == 'admin.applications.archived.show') active @endif">
          <a href="{{ route('admin.years.archived') }}">
            <i class="fa fa-file-archive-o"></i> <span>Archive</span>
          </a>
        </li>

        <li class="@if(Route::currentRouteName() == 'admin.photos.enabled.show' || Route::currentRouteName() == 'admin.photos.deleted.show') active @endif">
          <a href="{{ route('admin.photos.enabled.show') }}">
            <i class="fa fa-image"></i> <span>Photos</span>
          </a>
        </li>

      {{-- 
        <li class="@if(Route::currentRouteName() == 'admin.mails.show') active @endif">
          <a href="{{ route('admin.mails.show') }}">
            <i class="fa fa-envelope"></i> <span>Mails</span>
          </a>
        </li> 
          --}}

        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      @yield('contents')

  </div>
  

  <!-- /.content-wrapper -->

</div>

<!-- jQuery 3 -->
<script src="{{asset('assets/admin/AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('assets/admin/AdminLTE/dist/js/adminlte.min.js')}}"></script>

<!-- Toastr Js -->
<script src="{{asset('assets/admin/js/toastr.min.js')}}"></script>

@stack('scripts')

<script>

    @if(Session::has('success'))

        toastr.success("{{ Session::get("success") }}");


    @elseif(Session::has("errors"))
 
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach

        @else
            toastr.error("{{ $errors->first() }}");

        @endif

        // toastr.warning('Out Error Message');
        // toastr.info('Outside Message');

    @endif
    

</script>

</body>
</html>
