@extends('layouts.layoutMain')

@section('content')

<section class="block">
    <div class=" text-center my-5 title-block">
        <p>квіти</p>
    </div>
    <div class="product-wrapper row" style="height:auto;">
        @foreach($flowers as $flower)
        <div class="col-md-6 col-lg-4 product-card mb-4">
            <div class="card">
                <a href="/flowers/{{$flower->slug}}/{{$flower->heights()->orderBy('height')->first()->id}}" style="background-image: url('{{asset('media/flowers/' . $flower->id . '/m.jpg')}}')">
                    <img class="card-img-top" src="{{asset('media/flowers/' . $flower->id . '/' . 'h.jpg')}}">
                </a>
                <div class="card-body">
                    <div class="bouquet-name">
                        <h2 class="card-title text-center">{{$flower->name}}</h2>
                    </div>
                    
                    <div class="bouquet-info">
                        <p class="card-text">від {{$prices[$flower->id]}} <span>грн</span></p>    
                        <div class="to-basket-block">
                            <a href="/flowers/{{$flower->slug}}/{{$flower->heights()->orderBy('height')->first()->id}}" class="text-uppercase to-basket-button mt-2">Детальніше</a>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        @endforeach
        @if($flowers[0]==null)
        <div style="display:block">
        <p style="font-size:4rem; color:#8b8b8b;">Наразі немає доступних квітів...</p>
        <a href="/" style="font-size:2rem;color:#a72896f0">Головна</a>
        </div>
        @endif
    </div>
    <div class="paginator">
        <div class="paginator-block">
            {{$flowers->links()}}
        </div>
    </div>
</section>


@endsection