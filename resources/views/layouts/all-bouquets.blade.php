@extends('layouts.layoutMain')

@push('scripts')
<script src="{{asset('js/filter.js')}}"></script>
@endpush

@section('content')

<section class="block">
    <div class=" text-center my-5 title-block">
        <p>букети</p>
    </div>

    @if($bouquets->first()==null)
        <div style="display:block">
            <p style="font-size:4rem; color:#8b8b8b;">Наразі немає доступних букетів...</p>
            <a href="/" style="font-size:2rem;color:#a72896f0">Головна</a>
        </div>
    @else
    @include('layouts.filter-menu')
    <div class="filter-wrapper mb-3 py-2">
        <div class="icon-filter">
            <img src="{{asset('media/filter-button.svg')}}">
            Фільтр
        </div>
    </div>

    <div class="product-wrapper row mt-4">
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
    </div>
    <div class="paginator">
        <div class="paginator-block">
            {{$bouquets->appends(['price_filter' => request()->input('price_filter')])->links()}}
        </div>
    </div>
    @endif
</section>


@endsection
