<section class="block">
    <div class=" text-center my-5">
        <strong class="title-block"><p>ПОПУЛЯРНЕ</p></strong>
    </div>
    <div class="lazy">
    @foreach($hits_slides as $slide)
        <div class="lazy__slide">
            <div class="hit-slide-photo" style="background-image: url('{{asset('media/bouquets/' . $slide->bouquet->id . '/g.jpg')}}')">
                <a href="/bouquets/{{$slide->bouquet->slug}}/{{$slide->bouquet->sizes()->orderBy('count')->first()->id}}">
                    <img src="{{asset('media/bouquets/' . $slide->bouquet->id . '/gh.jpg')}}">
                </a>
            </div>
            <div class="lazy__text">
                <div class="lazy__text_title">
                    <h2 class="text-left h2 my-4 ">{{$slide->bouquet->name}}</h2>
                </div>
                <div class="lazy__text_price">
                    <p class="text-left">{{$hits_slides_prices[$slide->id]}} <span>грн</span></p>
                </div>
                <div class="lazy__text_button">
                    <form>
                        <a href="/bouquets/{{$slide->bouquet->slug}}/{{$slide->bouquet->sizes()->orderBy('count')->first()->id}}" class="to-basket-button mt-2">купити</a>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</section>
