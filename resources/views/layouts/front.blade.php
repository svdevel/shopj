<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
  <!-- Styles -->
  <link href="/frontend/css/moncss.css" rel="stylesheet">
  <link href="/frontend/css/bootstrap5.css" rel="stylesheet">

  <link href="/frontend/css/owl.carousel.min.css" rel="stylesheet">
  <link href="/frontend/css/owl.theme.default.min.css" rel="stylesheet">

  <!-- Police Montserrat - google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;1,400&display=swap"
    rel="stylesheet">
  <!-- Font Awesome - icones-->
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
    integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">


  <style>
    a {
      text-decoration: none !important;
    }
  </style>


</head>

<body>
  @include('layouts.inc.frontnavbar')
  <div class="content">
    @yield('content')
  </div>
  <!--Script frontend -->
  <script src="/frontend/js/jquery-3.6.0.min.js"></script>
  <script src="/frontend/js/bootstrap.bundle.min.js"></script>
  <script src="/frontend/js/owl.carousel.min.js"></script>

  <script src="/frontend/js/monjs.js" ></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if (session('status'))
  <script>
    swal("{{ session('status') }}");
  </script>
  @endif

  @yield('scripts')
</body>

</html>