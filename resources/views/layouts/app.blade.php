<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'One Beem') }}</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/bttn.min.css') }}">
  <link rel="stylesheet" href="{{asset('/css/bootstrap2-toggle.css')}}">
  <link href="{{ asset('/css/iziToast.min.css') }}" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

   <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body id="page-top">
  
    <!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Sidebar -->
    @include('admin.partials.left-sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        
        @include('admin.partials.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <!-- Content Row -->
          <div class="row">

              @yield('admin-content')

          </div>
          
        </div>
        <!-- /.container-fluid -->
        
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
    
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('/js/iziToast.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap2-toggle.min.js') }}"></script>
  <!-- Custom scripts -->
  @yield('script')

</body>
</html>
