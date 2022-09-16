
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Admin')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('asset-admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('asset-admin/plugins/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset-admin/dist/css/adminlte.min.css') }}">

  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('backend.layouts.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('backend.layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('asset-admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('asset-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('asset-admin/plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset-admin/dist/js/adminlte.min.js') }}"></script>

@livewireScripts

@stack('scriptjs')

<script>
  window.livewire.on("modalBootstrap",() => {
    $(".modal").modal("hide");
  })

  window.addEventListener('toastr',function(e) {
    let alertToastr;
    if(e.detail.type == 'success') {
      alertToastr = toastr.success(e.detail.message);
    } else if(e.detail.type == 'info') {
      alertToastr = toastr.info(e.detail.message);
    } else if(e.detail.type == 'warning') {
      alertToastr = toastr.warning(e.detail.message);
    } else if(e.detail.type == 'danger') {
      alertToastr = toastr.danger(e.detail.message);
    }else{
      alertToastr = toastr.danger(e.detail.message);
    }
    alertToastr;
  })

  
</script>
</body>
</html>
