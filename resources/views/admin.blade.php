<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Admin</title>

  <link rel="shortcut icon" href="{{asset('img/brand.png')}}" type="image/png">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/admin.css')}}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}"/>

</head>

@yield('hidden')

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-light">Million Flowers</div>
      <div class="list-group list-group-flush">
        <a href="/admin/head-slider" class="list-group-item list-group-item-action">Головний слайдер</a>
        <a href="/admin/hits-slider" class="list-group-item list-group-item-action">Хіти продаж</a>
        <a href="#" class="list-group-item list-group-item-action">Букет дня</a>
        <a href="/admin/all-products" class="list-group-item list-group-item-action">Всі товари</a>
        <a href="/admin/nav-edit" class="list-group-item list-group-item-action">Меню</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav  mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">Сайт<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        
        @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  
  <script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>

  @stack('scripts')

  <link rel="stylesheet" type="text/css" href="{{asset('css/head-slider-style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/hits-slider-style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/admin-add-bouquet.css')}}">

</body>

</html>
