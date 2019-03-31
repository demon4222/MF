@extends('admin')

@push('scripts')
<link href="{{asset('css/more_options.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endpush

@section('content')

<a href="/admin/flowers/add-flower" class="b-ghost">Додати квітку</a>

<div class="product-wrapper row">
    @foreach($flowers as $flower)
    <div class="col-md-6 col-lg-4 product-card mb-4">
        <div class="card">
            <a href="{{route('flower.show',[$flower->slug, $flower->heights()->orderBy('height')->first()->id])}}" style="background-image: url('{{asset('/media/flowers/' . $flower->id . '/' . 'm.jpg')}}')">
                <img class="card-img-top" src="{{asset('/media/flowers/' . $flower->id . '/' . 'h.jpg')}}">
                @if($flower->inStock)
                <p class="stock text-uppercase">в наявності</p>
                @else
                <p class="stock text-uppercase">не в наявності</p>
                @endif
            </a>
            <div class="card-body">
                <h5 class="card-title">{{$flower->name}}</h5>
                <p class="card-text">{{$prices[$flower->id]}} <span>грн</span></p>
                <a href="/admin/flowers/edit/{{$flower->id}}" class="btn btn-primary">Редагувати</a>
                <a href="/admin/flowers/delete/{{$flower->id}}" class="btn btn-danger">Видалити</a>

                <div class="dropdown">
                <i class=" dropbtn material-icons">more_horiz</i>
                    <div class="dropdown-content">
                        @if($flower->inStock)
                        <a href="{{route('admin.flower.outOfStock',[$flower->id])}}">Встановити "не в наявності"</a>
                        @else
                        <a href="{{route('admin.flower.inStock',[$flower->id])}}">Встановити "в наявності"</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection