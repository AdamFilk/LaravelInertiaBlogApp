<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('imgs/logo.png')}}">
    <link rel="icon" type="image/png" href="{{asset('imgs/logo.png')}}">
    <!-- Nucleo Icons -->
    <link href="{{asset('/argon/argon_css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/argon/argon_css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('/argon/argon_css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/argon/argon_css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
    <title>NeonTechies</title>
    @routes
    @vite('resources/js/app.js')
    @inertiaHead
  </head>
  <body class="g-sidenav-show bg-gray-100">
    @inertia
     <!--   Core JS Files   -->
    {{-- <script src="{{asset('/argon/argon_js/argon-dashboard.min.js')}}"></script> --}}
    <script src="{{asset('/argon/argon_js/core/popper.min.js')}}"></script>
    <script src="{{asset('/argon/argon_js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('/argon/argon_js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('/argon/argon_js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('/argon/argon_js/plugins/chartjs.min.js')}}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  </body>
</html>