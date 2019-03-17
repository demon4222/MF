@extends('admin')

@section('content')
<section class="block">
  <h1 class="mt-4 mb-3">Головний слайдер</h1>
 <div class="head-sl">
  @foreach($head_slides as $head_slide)

  <div class="head-sl__slide bg-head-image" style="background-image: url('{{asset($head_slide->path_to_photo)}}')">
    

   <div class="head-sl__text">
    @if($head_slide->description)
    <div class="head-sl__text_description text-justify">
      <h2 class="h1 text-white text-uppercase">{{$head_slide->description}}</h2>
    </div>
    @endif

    @if($head_slide->button_text)
    <div class="head-sl__text_button mt-5">
      <a href="" class="b-ghost">{{$head_slide->button_text}}</a>
    </div>
    @endif
    <div class="head-sl__text_button mt-5">
      <a href="/admin/head-slider/edit/{{$head_slide->id}}" class="b-ghost">Редагувати</a>
    </div>
   </div>
  </div>
  
  @endforeach
  
 </div>
 <a href="/admin/head-slider/add" class="b-ghost">Додати слайд</a>
</section>

@endsection