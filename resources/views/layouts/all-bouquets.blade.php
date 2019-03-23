@extends('layouts.layoutMain')

@section('content')

<section class="block">
    <div class=" text-center my-5 title-block">
        <p>букети</p>
    </div>
    <div class="product-wrapper row" style="height:auto;">
        @foreach($bouquets as $bouquet)
        <div class="col-md-6 col-lg-4 product-card mb-4">
            <div class="card">
                <a href="/bouquets/{{$bouquet->slug}}/{{$bouquet->sizes()->orderBy('count')->first()->id}}" style="background-image: url('{{asset('media/bouquets/' . $bouquet->id . '/g.jpg')}}')">
                    <img class="card-img-top" src="{{asset('media/bouquets/' . $bouquet->id . '/' . 'gh.jpg')}}">
                </a>
                <div class="card-body">
                    <div class="bouquet-name">
                        <h2 class="card-title text-center">{{$bouquet->name}}</h2>
                    </div>
                    
                    <div class="bouquet-info">
                        <p class="card-text">від {{$prices[$bouquet->id]}} <span>грн</span></p>    
                        <div class="to-basket-block">
                            <a href="/bouquets/{{$bouquet->slug}}/{{$bouquet->sizes()->orderBy('count')->first()->id}}" class="text-uppercase to-basket-button mt-2">Детальніше</a>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        @endforeach
    </div>
    <div class="paginator">
        <div class="paginator-block">
            {{$bouquets->links()}}
        </div>
    </div>
</section>


@endsection