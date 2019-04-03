@if($head_slides->first()!=null)
    <section class="block">
        <div class="head-sl">
            @foreach($head_slides as $head_slide)

                <div class="head-sl__slide bg-head-image"
                     style="background-image: url('{{$head_slide->path_to_photo}}');">


                    <div class="head-sl__text">
                        @if($head_slide->description)
                            <div class="head-sl__text_description">
                                <h2 class="h1 text-white text-uppercase">{{$head_slide->description}}</h2>
                            </div>
                        @endif

                        @if($head_slide->button_text)
                            <div class="head-sl__text_button">
                                <a href="{{$head_slide->button_link}}" class="b-ghost text-uppercase">{{$head_slide->button_text}}</a>
                            </div>
                        @endif
                    </div>
                </div>

            @endforeach
        </div>
    </section>
@endif

