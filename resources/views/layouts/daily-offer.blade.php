<section class="block" style="padding-right: 20px; padding-left: 20px;">
	<div class="daily-offer mt-5" >
		<div class="row">
			<div class="col-md-6 daily-offer-media">
				<div class="daily-offer-photo text-left" style="background-image: url('{{asset('media/bouquets/' . $bouquetOfTheDay['id'] . '/g.jpg')}}');">
					<a href="#">
						<img src="{{asset('media/bouquets/' . $bouquetOfTheDay['id'] . '/gh.jpg')}}">
					</a>
				</div>
			</div>

			<div class="col-md-6 daily-offer-description">
				<div class="daily-offer-head">
					<h2 class="daily-offer-title h2">Пропозиція дня</h2>
					<h3 class="daily-offer_name ">{{$bouquetOfTheDay['name']}}</h3>
				</div>

				<div class="daily-offer-price ">
					<p class="daily-offer_usual-price">{{$bouquetOfTheDay['usual_price']}} <span>грн</span></p>
					<p class="daily-offer_discount-price mt-0">{{$bouquetOfTheDay['discount_price']}} <span>грн</span></p>
				</div>

				<div class="daily-offer-buttons">
					<a href="" class="to-basket-button">ДОДАТИ У КОШИК</a>
				</div>
			</div>
		</div>
	</div>
</section>