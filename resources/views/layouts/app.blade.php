<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'One Beem') }}</title>

    {{-- auth guard admin styles --}}
    @auth('admin')
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/libs/css/style.css">
        <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="/assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="/assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/assets/vendor/charts/c3charts/c3.css">
    @endauth

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Roboto:700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{ asset('/css/bttn.min.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('/css/iziToast.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
      h4, h2, #productName{
        font-family: 'Roboto', sans-serif;
      }
    </style>
</head>
<body>
    <div id="app">
      
      @include('partials.navbar')

        <main class="py-4">

            @yield('content')
             
        </main>
        
      @if(auth('admin'))
          {{-- admin nav bar --}}        
          @include('admin.partials.admin-navbar')
          
          {{--  admin dashboard left sidebar    --}}              
          @include('admin.partials.left-sidebar')

          <div class="dashboard-wrapper">
              <div class="dashboard-ecommerce">
                  <div class="container-fluid dashboard-content ">
                        
                        {{--  admin content goes here --}}   
                        @yield('admin-content')
                        
                  </div>
              </div>
          </div>
      @endif
    
    </div>
      @if(auth('admin'))
          <!-- slimscroll js -->
          <script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
          <!-- main js -->
          <script src="/assets/libs/js/main-js.js"></script>
          <!-- chart chartist js -->
          <script src="/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
          <!-- sparkline js -->
          <script src="/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
          <!-- morris js -->
          <script src="/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
          <script src="/assets/vendor/charts/morris-bundle/morris.js"></script>
          <!-- chart c3 js -->
          <script src="/assets/vendor/charts/c3charts/c3.min.js"></script>
          <script src="/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
          <script src="/assets/vendor/charts/c3charts/C3chartjs.js"></script>
          <script src="/assets/libs/js/dashboard-ecommerce.js"></script>
      @endif

      <!-- Custom scripts for this template -->
      <script src="/js/iziToast.min.js"></script>
      <!-- Adding Custom scripts  -->
      @yield('script')
      <!-- =====================  -->
  
</body>
</html>
