@extends ('admin')

@push('scripts')
<script type="text/javascript" src="{{asset('js/hits-slider.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/hits-slider-style.css')}}">
@endpush 

@section('content')

<section class="block">
    <div class=" text-center my-5">
        <strong class="title-block"><p>ПОПУЛЯРНЕ</p></strong>
    </div>
    <div class="lazy">
    @foreach($slides as $slide)
        <div class="lazy__slide">
            <a>
                <img src="{{asset('media/bouquets/' . $slide->bouquet->id . '/g.jpg')}}">
            </a>
            <div class="lazy__text">
                <div class="lazy__text_title">
                    <h2 class="text-left h2 my-4 ">{{$slide->bouquet->name}}</h2>
                </div>
                <div class="lazy__text_price">
                    <p class="text-left" style="font-size: 1.5rem;">{{$prices[$slide->id]}} <span>грн</span></p>
                </div>
                <div class="lazy__text_button">
                    <a href="/admin/hits-slider/delete-slide/{{$slide->id}}" class="to-basket-button mt-2" style="background-color:red">Видалити</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</section>

@endsection