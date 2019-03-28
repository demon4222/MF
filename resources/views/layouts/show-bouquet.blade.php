@extends('layouts.layoutMain')

@section('content')
	<section class="block">
		<div class="row product-wrapper">
			<div class="col-xs-12 col-sm-6">
				<div class="product-sl-wrapper">
					<div class="product-sl">
						<div class="product-sl__slide">
							<img src="{{asset('media/bouquets/' . $bouquet->id . '/' . $size->id . '_m.jpg')}}">
						</div>
						<div class="product-sl__slide">
							<img src="{{asset('media/bouquets/' . $bouquet->id . '/' . $size->id . '_h.jpg')}}">
						</div>
						<div class="product-sl__slide">
							<img src="{{asset('media/bouquets/' . $bouquet->id . '/' . $size->id . '_a.jpg')}}">
						</div>
					</div>
					<div class="product-sl-nav">
						<div class="product-sl-nav__slide">
							<img src="{{asset('media/bouquets/' . $bouquet->id . '/' . $size->id . '_m.jpg')}}" alt="">
						</div>
						<div class="product-sl-nav__slide">
							<img src="{{asset('media/bouquets/' . $bouquet->id . '/' . $size->id . '_h.jpg')}}" alt="">
						</div>
						<div class="product-sl-nav__slide">
							<img src="{{asset('media/bouquets/' . $bouquet->id . '/' . $size->id . '_a.jpg')}}" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="product-info-wrapper">
					<div class="product-title mb-5">
						<h2 class="product-name">{{$bouquet->name}}</h2>
						<!-- <p class="product-article">Арт. 00001</p> -->
					</div>
					<div class="product-price mb-5">
						{{$size->pivot->price}} <span>грн</span>
					</div>
					<div class="product-sizes">
						<div class="product-sizes-title">
							<p>РОЗМІРИ</p>
						</div>
						<div class="size-block ml-5">
							<div class="size-data px-1">
								{{$size->height}}
							</div>
							<div class="size-icon px-1">
								<img src="https://donpion.ua/static/media/uploads/shop/height.png" alt="">
							</div>
						</div>
						<div class="size-block ml-3">
							<div class="size-data px-1">
								{{$size->diameter}}
							</div>
							<div class="size-icon px-1">
								<img src="https://donpion.ua/static/media/uploads/shop/diametr.png" alt="">
							</div>
						</div>
					</div>
					<div class="product-size-vars mt-5">
						<ul class="product-size-vars-list">
						@foreach($add_sizes as $add_size)
							<li>
								@if($add_size['id']===$size->id)
									<a href="/bouquets/{{$bouquet->slug}}/{{$add_size['id']}}" class="product-size-var-active">{{$add_size['name']}}</a>
								@else
									<a href="/bouquets/{{$bouquet->slug}}/{{$add_size['id']}}" class="product-size-var">{{$add_size['name']}}</a>
								@endif
							</li>
						@endforeach
						</ul>
					</div>
					<div class="to-bascket-block mt-5">
						<form action="{{route('cart.storeBouquet')}}" method="POST">
							@csrf
							<input type="hidden" name="id" value="{{$bouquet->id}}">
							<input type="hidden" name="name" value="{{$bouquet->name}}">
							<input type="hidden" name="price" value="{{$size->pivot->price}}">
							<input type="hidden" name="size_id" value="{{$size->id}}">
							<input type="hidden" name="" value="">
							<button class="to-basket-button mt-2" type="submit">В КОШИК</button>
						</form>
						<!-- <a href="#" class="to-basket-button mt-2">В КОШИК</a> -->
					</div>
					<div class="description-block mt-5">
						<p>{{$bouquet->description}}</p>
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

