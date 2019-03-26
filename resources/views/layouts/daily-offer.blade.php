<section class="block">
	<div class="daily-offer mt-5" >
		<div class="row">
			@if($bouquetOfTheDay!==null)
			<div class="col-md-6 daily-offer-media">
				<div class="daily-offer-photo text-left" style="background-image: url('{{asset('media/bouquets/' . $bouquetOfTheDay['bouquet']->id . '/g.jpg')}}');">
					<a href="/bouquets/{{$bouquetOfTheDay['bouquet']->slug}}/{{$bouquetOfTheDay['bouquet']->sizes()->orderBy('count')->first()->id}}">
						<img src="{{asset('media/bouquets/' . $bouquetOfTheDay['bouquet']->id . '/gh.jpg')}}">
					</a>
				</div>
			</div>

			<div class="col-md-6 daily-offer-description">
				<div class="daily-offer-head">
					<h2 class="daily-offer-title h2">Пропозиція дня</h2>
					<h3 class="daily-offer_name ">
					<a href="/bouquets/{{$bouquetOfTheDay['bouquet']->slug}}/{{$bouquetOfTheDay['bouquet']->sizes()->orderBy('count')->first()->id}}">
						{{$bouquetOfTheDay['bouquet']->name}}</h3>
					</a>
				</div>

				<div class="daily-offer-price ">
					<p class="daily-offer_usual-price">{{$bouquetOfTheDay['bouquet']->sizes()->orderBy('count')->first()->pivot->price}} <span>грн</span></p>
					<p class="daily-offer_discount-price mt-0">{{$bouquetOfTheDay['discount_price']}} <span>грн</span></p>
				</div>

				<div class="daily-offer-buttons">
					<a href="/bouquets/{{$bouquetOfTheDay['bouquet']->slug}}/{{$bouquetOfTheDay['bouquet']->sizes()->orderBy('count')->first()->id}}" class="to-basket-button">детальніше</a>
				</div>
			</div>
			@endif
		</div>
	</div>
</section>