<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/admin.css')}}" rel="stylesheet">
  <link href="{{asset('css/edit-slide.css')}}" rel="stylesheet">

</head>

<body>
  <div class="change-photo-block p-3" id="change-photo-block">
    <a href="#" class="close-button"><i class='fas fa-window-close' style='font-size:24px;color:red'></i></a>
    <form enctype="multipart/form-data" method="post" action="/admin/head-slider/{{$slide->id}}/change-photo">
      {!! csrf_field() !!}
      <p>Виберіть фото</p>
      <p><input required type="file" name="photo" multiple accept="image/jpeg">
      <input type="submit" value="Відправити"></p>
    </form>
  </div>

  <div class="delete-slide-block p-3 text-center" id="delete-photo-block">
    <a href="#" class="close-button"><i class='fas fa-window-close' style='font-size:24px;color:red'></i></a>
    <form action="/admin/head-slider/{{$slide->id}}/delete" method="post">
      {!! csrf_field() !!}
      <button>Видалити</button>
    </form>
  </div>

  <div class="change-text-block p-3 text-center" id="change-text-block">
    <a href="#" class="close-button"><i class='fas fa-window-close' style='font-size:24px;color:red'></i></a>
    <form action="">
      {!! csrf_field() !!}
      <input type="text">
      <button type="submit">Змінити</button>
    </form>
  </div>

  <div class="change-button-block p-3 text-center" id="change-button-block">
    <a href="#" class="close-button"><i class='fas fa-window-close' style='font-size:24px;color:red'></i></a>
    <form method="post" action="/admin/head-slider/{{$slide->id}}/change-button">
      {!! csrf_field() !!}
      <input type="text" name="button_text">
      <button type="submit">Змінити</button>
    </form>
  </div>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-light">Million Flowers</div>
      <div class="list-group list-group-flush">
        <a href="/admin/head-slider" class="list-group-item list-group-item-action">Головний слайдер</a>
        <a href="#" class="list-group-item list-group-item-action">Хіти продаж</a>
        <a href="#" class="list-group-item list-group-item-action">Букет дня</a>
        <a href="#" class="list-group-item list-group-item-action">Всі товари</a>
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
          <div class="slide-edit mt-3">            
              <img class="photo" src="{{asset($slide->path_to_photo)}}">
              <div class="slide-edit-buttons row ml-auto">
                <div class="col-3">
                  <a href="#" class="b-ghost delete-slide">Видалити слайд</a>
                </div>
                <div class="col-3">
                  <a href="#" class="b-ghost change-photo">Змінити фото</a>
                </div>
                <div class="col-3">
                  <a href="#" class="b-ghost change-text">Змінити текст</a>
                </div>
                <div class="col-3">
                  <a href="#" class="b-ghost change-button">Змінити кнопку</a>
                </div>
              </div>
          </div>

          
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
  <link rel="stylesheet" type="text/css" href="{{asset('css/head-slider-style.css')}}">
  <link rel="stylesheet" type="text/css" href="../{{asset('css/hits-slider-style.css')}}">
  <script type="text/javascript" src = "{{asset('js/admin/edit-form.js')}}"></script>
</body>

</html>
