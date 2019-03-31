<!doctype html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="{{asset('img/brand.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"> <!-- Resource style -->
    <script src="{{asset('js/modernizr.js')}}"></script> <!-- Modernizr -->
    <link media="screen" href="{{asset('demo/styles/demo.css')}}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}"/>
    
    @stack('styles')

    <title>Million Flowers</title>
</head>

    @stack('hidden')
<body>
    <div class="menu-wrap">
    <header class="cd-main-header">
        <div class="cd-logo-icon">
            <a href="/">
            @include('layouts.brand-icon-svg')
            </a>
        </div>
        <a class="cd-logo" href="/">Million Flowers</a>
        <ul class="cd-header-buttons">
            <li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
            <li>
                @if(Cart::count()!=0)
                <a href="{{route('cart.index')}}" class="cart-link cart-link--goods">
                    <span class="cart-link__ico">
                    <svg width="24" height="24" viewBox="0 0 72.39 78.97"><g data-name="cart_layer"><path fill="#333333" d="M64.37 18.33H50.75v-4.14A14.21 14.21 0 0 0 36.55 0h-.72a14.21 14.21 0 0 0-14.18 14.19v4.14H8L0 79h72.39zM25 14.19A10.9 10.9 0 0 1 35.84 3.3h.72a10.9 10.9 0 0 1 10.88 10.89v4.14H25zm-14 7.44h10.65v8.85a3.64 3.64 0 1 0 3.3-.09v-8.76h22.49v8.81a3.65 3.65 0 1 0 3.3 0v-8.81h10.74l7.15 54H3.77z"></path></g></svg>
                    </span>
                </a>
                @else
                <a href="{{route('cart.index')}}" class="cart-link">
                    <span class="cart-link__ico">
                    <svg width="24" height="24" viewBox="0 0 72.39 78.97"><g data-name="cart_layer"><path fill="#333333" d="M64.37 18.33H50.75v-4.14A14.21 14.21 0 0 0 36.55 0h-.72a14.21 14.21 0 0 0-14.18 14.19v4.14H8L0 79h72.39zM25 14.19A10.9 10.9 0 0 1 35.84 3.3h.72a10.9 10.9 0 0 1 10.88 10.89v4.14H25zm-14 7.44h10.65v8.85a3.64 3.64 0 1 0 3.3-.09v-8.76h22.49v8.81a3.65 3.65 0 1 0 3.3 0v-8.81h10.74l7.15 54H3.77z"></path></g></svg>
                    </span>
                </a>
                @endif
            </li>
            <li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
        </ul> <!-- cd-header-buttons -->
    </header>
    </div>

    <main class="cd-main-content bg-white mb-5">
        @yield('content')   
    </main>

    <nav class="cd-nav">
        <ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
            <li class="has-children">
                <a href="#">Букети</a>

                <ul class="cd-secondary-nav is-hidden">
                    <li class="go-back"><a href="#0">Меню</a></li>
                    <li class="see-all"><a href="/bouquets">Усі букети</a></li>
                    @foreach($types as $type)
                    <li class="has-children">
                        <a href="/bouquet-types/{{$type->slug}}">{{$type->name}}</a>
                        <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Букети</a></li>
                            <li class="see-all"><a href="#">Кисти</a></li>
                            @foreach($type->bouquetsSubTypes as $subType)
                            <li><a href="/bouquet-sub-types/{{$subType->slug}}">{{$subType->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach                
                </ul>
            </li>

            <li class="has-children">
                <a href="#">Квіти поштучно</a>

                <ul class="cd-secondary-nav is-hidden">
                    <li class="go-back"><a href="#0">Навігація</a></li>
                    <li class="see-all"><a href="#">Усі квіти</a></li>
                    @foreach($flowerCategory as $category)
                    <li>
                        <a class="" href="/flower-type/{{$category->slug}}">
                            {{$category->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>

            <li class="has-children">
                <a href="#">Послуги</a>
                <ul class="cd-nav-icons is-hidden">
                    <li class="go-back"><a href="#0">Меню услуг</a></li>
                    <li class="see-all"><a href="#">Смотреть услуги</a></li>
                    <li>
                        <a class="cd-nav-item item-1" href="#">
                            <h3>Додаткові комплектуючі</h3>
                            
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-2" href="#">
                            <h3>Безкоштовна доставка</h3>
                            
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-3" href="#">
                            <h3>Індивідуальне оформлення</h3>
                            
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-4" href="#">
                            <h3>Доставка у неробочій час</h3>
                            
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-5" href="#">
                            <h3>Фото перед відправкою</h3>
                            
                        </a>
                    </li>

                    <li>
                        <a class="cd-nav-item item-6" href="#">
                            <h3>Листівка</h3>
                            
                        </a>
                    </li>
                </ul>
            </li>

            <li><a href="#">Про нас</a></li>
        </ul> <!-- primary-nav -->
    </nav> <!-- cd-nav -->

    <div id="cd-search" class="cd-search">
        <form>
            <input type="search" placeholder="Пошук...">
        </form>
    </div>

    @include('layouts.footer')
    <!--nav-->
        <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
        <script src="{{asset('js/jquery.mobile.custom.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script> <!-- Resource jQuery -->
    <!--nav-->
  <!-- Bootstrap tooltips -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  
  <script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/product-slider.js')}}"></script>
  @stack('scripts')
<link rel="stylesheet" type="text/css" href="{{asset('css/mystyle.css')}}">
</body>
</html>