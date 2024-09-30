<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ url('vendors/typicons.font/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('images/favicon.png') }}">
  </head>
  <body>
    <!-- partial:partials/proBanner -->
    @include('partials.proBanner ')
    <!-- partial/proBanner  -->

    <div class="container-scroller">

      <!-- partial:partials/navbar -->
      @include('partials.navbar')
      <!-- partial/navbar -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/settings-panel -->
        @include('partials.settings-panel')
        <!-- partial/settings-panel  -->

        <!-- partial:partials/sidebar -->
        @include('partials.sidebar')
        <!-- partial/sidebar -->

        <!-- index -->
        @yield('content')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{url('vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{url('js/off-canvas.js')}}"></script>
    <script src="{{url('js/hoverable-collapse.js')}}"></script>
    <script src="{{url('js/template.js')}}"></script>
    <script src="{{url('js/settings.js')}}"></script>
    <script src="{{url('js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{url('vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{url('vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{('js/dashboard.js')}}"></script>
    <!-- End custom js for this page-->
  </body>
</html>