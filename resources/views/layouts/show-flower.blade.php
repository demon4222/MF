@extends('layouts.layoutMain')

@push('styles')
<style>
.slick-track{
	transform: none!important;
	margin-left:0;
}
</style>
@endpush

@section('content')
	<section class="block">
		<div class="row product-wrapper">
			<div class="col-xs-12 col-sm-6">
				<div class="product-sl-wrapper">
					<div class="product-sl">
						<div class="product-sl__slide">
							<img src="{{asset('media/flowers/' . $flower->id . '/m.jpg')}}">
						</div>
						<div class="product-sl__slide">
							<img src="{{asset('media/flowers/' . $flower->id . '/h.jpg')}}">
						</div>
					</div>
					<div class="product-sl-nav">
						<div class="product-sl-nav__slide">
							<img src="{{asset('media/flowers/' . $flower->id . '/m.jpg')}}" alt="">
						</div>
						<div class="product-sl-nav__slide">
							<img src="{{asset('media/flowers/' . $flower->id . '/h.jpg')}}" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="product-info-wrapper">
					<div class="product-title mb-5">
						<h2 class="product-name">{{$flower->name}}</h2>
						<!-- <p class="product-article">Арт. 00001</p> -->
					</div>
					<div class="product-price mb-5">
						{{$height->pivot->price}} <span>грн</span>
					</div>
					<div class="product-sizes">
						<div class="product-sizes-title">
							<p>Довжина, см</p>
						</div>
					</div>
					<div class="product-size-vars mt-3">
						<ul class="product-size-vars-list">
						@foreach($add_heights as $add_height)
							<li>
								@if($add_height['id']===$height->id)
									<a href="/flowers/{{$flower->slug}}/{{$add_height['id']}}" class="product-size-var-active">{{$add_height['name']}}</a>
								@else
									<a href="/flowers/{{$flower->slug}}/{{$add_height['id']}}" class="product-size-var">{{$add_height['name']}}</a>
								@endif
							</li>
						@endforeach
						</ul>
					</div>
					<div class="to-bascket-block mt-5">
						<a href="#" class="to-basket-button mt-2">В КОШИК</a>
					</div>
					<div class="description-block mt-5">
                        <h3><strong>Опис</strong></h3>
						<p>{{$flower->description}}</p>
					</div>
					<div class="description-block mt-4">
						<h3><strong>Доставка</strong></h3>
						<p>інформація</p>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection