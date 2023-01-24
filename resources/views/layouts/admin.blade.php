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
  <link href="/admin/css/moncss.css" rel="stylesheet">
  <link href="/admin/css/material-dashboard.css" rel="stylesheet">
</head>

<body>

  <div class="wrapper">
    @include('layouts.inc.sidebar')
    <div class="main-panel">

      <div class="content">
        @yield('content')
      </div>

      @include('layouts.inc.adminfooter')
    </div>
  </div>


  <!--Script dashbord admin -->
    <script src="/admin/js/jquery.min.js" defer></script>
    <script src="/admin/js/popper.min.js" defer></script>
    <script src="/admin/js/bootstrap-material-design.min.js" defer></script>
    <script src="/admin/js/perfect-scrollbar.jquery.min.js" defer></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
      <script>
        swal("{{ session('status') }}");
      </script>
    @endif

    @yield('scripts')
  

  <!-- Scripts -->
  
</body>

</html>