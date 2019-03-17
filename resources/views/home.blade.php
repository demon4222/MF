<!doctype html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="img/brand.png" type="image/png">
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <link media="screen" href="demo/styles/demo.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Material Design Bootstrap -->
    <!-- <link href="css/mdb.min.css" rel="stylesheet">
 -->    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <title>Million Flowers</title>
</head>
<body>
    <div class="menu-wrap">
    <header class="cd-main-header">
        <div class="cd-logo-icon">
            @include('layouts.brand-icon-svg')
        </div>
        <a class="cd-logo" href="/">Million Flowers</a>
        <ul class="cd-header-buttons">
            <li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
            <li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
        </ul> <!-- cd-header-buttons -->
    </header>
    </div>
    <main class="cd-main-content bg-white container-fluid">
        <!--head-slider-->
        @include('layouts.head-slider')
        <!--head-slider-->   
        @include('layouts.hits-slider')

        @include('layouts.daily-offer')

        @include('layouts.bouquet-types')

        @include('layouts.utp')
    </main>

    <nav class="cd-nav">
        <ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
            <li class="has-children">
                <a href="#">Букети</a>

                <ul class="cd-secondary-nav is-hidden">
                    <li class="go-back"><a href="#0">Меню</a></li>
                    <li class="see-all"><a href="#">Всі букети</a></li>
                    
                    <li class="has-children">
                        <a href="#">Звичайні букети</a>

                        <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Букети</a></li>
                            <li class="see-all"><a href="#">Кисти</a></li>
                            <li><a href="#">21, 51, 101 троянда</a></li>
                            <li><a href="#">Букети з імпортних троянд</a></li>
                            <li><a href="#0">Букети з місцевих троянд</a></li>
                            <li><a href="#0">Букети з піоновидних троянд</a></li>
                            <li><a href="#0">Букети з тюльпанів</a></li>
                        </ul>
                    </li>

                    <li class="has-children">
                        <a href="#">Композиції</a>

                        <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Введения</a></li>
                            <li class="see-all"><a href="#">Термины</a></li>
                            <li><a href="#">Композиції з місцевих квітів</a></li>
                            <li><a href="#">Композиції з імпортних квітів</a></li>
                            <li><a href="#">Композиції в коробці</a></li>
                        </ul>
                    </li>                    
                </ul>
            </li>

            <li class="has-children">
                <a href="#">Квіти поштучно</a>

                <ul class="cd-nav-gallery is-hidden">
                    <li class="go-back"><a href="#0">Навигация по последним изображениям</a></li>
                    <li class="see-all"><a href="#">Усі квіти</a></li>
                    <li>
                        <a class="cd-nav-item" href="#">
                            <img src="media/nav/el-toro-472x472.jpg" alt="Product Image">
                            <h3>Назва</h3>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item" href="#">
                            <img src="media/nav/karina-472x472.jpg" alt="Product Image">
                            <h3>Назва</h3>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item" href="#">
                            <img src="media/nav/sprey-lady-bombastic-472x472.jpg" alt="Product Image">
                            <h3>Назва</h3>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item" href="#">
                            <img src="media/nav/tulips-white-0x700.jpg" alt="Product Image">
                            <h3>Назва</h3>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="has-children">
                <a href="#">Послуги</a>
                <ul class="cd-nav-icons is-hidden">
                    <li class="go-back"><a href="#0">Меню услуг</a></li>
                    <li class="see-all"><a href="#">Смотреть услуги</a></li>
                    <li>
                        <a class="cd-nav-item item-1" href="#">
                            <h3>Нарисовать макет</h3>
                            <p>Мі сделаем для вас лучший макет</p>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-2" href="#">
                            <h3>Местоположение</h3>
                            <p>Мы добавим ваши координаты на сайт</p>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-3" href="#">
                            <h3>Изображения</h3>
                            <p>Мы делаем лучшие картинки</p>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-4" href="#">
                            <h3>Фото</h3>
                            <p>Фото лучших моментов вашей жизни</p>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-5" href="#">
                            <h3>Отдыхайте</h3>
                            <p>Отдыхайте пока мы работаем</p>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-6" href="#">
                            <h3>Поддержка</h3>
                            <p>Круглосуточная поддержка проектов</p>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-7" href="#">
                            <h3>Настройка сайта</h3>
                            <p>Мы постоянно обслуживаем наши проекты</p>
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-8" href="#">
                            <h3>Все делаем во время</h3>
                            <p>Проект будет разработан в установленные сроки</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li><a href="#">Про нас</a></li>
        </ul> <!-- primary-nav -->
    </nav> <!-- cd-nav -->

    <div id="cd-search" class="cd-search">
        <form>
            <input type="search" placeholder="Поиск...">
        </form>
    </div>

  <!-- Footer -->
  @include('layouts.footer')
  <!-- Footer -->
    <!--nav-->
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/jquery.mobile.custom.min.js"></script>
        <script src="js/main.js"></script> <!-- Resource jQuery -->
    <!--nav-->
  <!-- Bootstrap tooltips -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>
  <script type="text/javascript" src="js/hits-slider.js"></script>
  <script type="text/javascript" src="js/head-slider.js"></script>
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</body>
</html>