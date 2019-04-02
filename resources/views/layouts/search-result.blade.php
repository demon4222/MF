@extends('layouts.layoutMain')

@section('content')

<section class="block">
    @if(session()->has('success_message'))
        <div class="alert alert-success">
            {{session()->get('success_message')}}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>$error</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="product-wrapper row">
        @foreach($bouquets as $bouquet)
        <div class="col-md-6 col-lg-4 product-card mb-4  ">
            <div class="card">
                <a href="/bouquets/{{$bouquet->slug}}/{{$bouquet->sizes()->orderBy('count')->first()->id}}" style="background-image: url('{{asset('media/bouquets/' . $bouquet->id . '/g.jpg')}}')">
                    <img style="" class="card-img-top" src="{{asset('media/bouquets/' . $bouquet->id . '/' . 'gh.jpg')}}">
                </a>
                <div class="card-body">
                    <div class="bouquet-name">
                        <h2 class="card-title text-center">{{$bouquet->name}}</h2>
                    </div>
                    
                    <div class="bouquet-info">
                        <p class="card-text">{{$prices[$bouquet->id]}} <span>грн</span></p>    
                        <div class="to-basket-block">
                            <a href="/bouquets/{{$bouquet->slug}}/{{$bouquet->sizes()->orderBy('count')->first()->id}}" class="text-uppercase to-basket-button mt-2">Купити</a>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        @endforeach
        @if($bouquets[0]==null)
        <div style="display:block">
        <p style="font-size:4rem; color:#8b8b8b;">Наразі немає доступних букетів...</p>
        <a href="/" style="font-size:2rem;color:#a72896f0">Головна</a>
        </div>
        @endif
    </div>
    <div class="paginator">
        <div class="paginator-block">
            {{$bouquets->appends(['q' => request()->input('q')])->links()}}
        </div>
    </div>

</section>

@endsection