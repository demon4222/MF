@extends('admin')

@section('content')

<a href="/admin/add-bouquet" class="b-ghost">Додати букет</a>
<a href="" class="b-ghost">Додати квіти</a>

<div class="product-wrapper row">
    @foreach($bouquets as $bouquet)
    <div class="col-md-6 col-lg-4 product-card mb-4">
        <div class="card">
            <img class="card-img-top" src="{{asset('media/bouquets/13_6_h.jpg')}}">
            <div class="card-body">
                <h5 class="card-title">{{$bouquet->name}}</h5>
                <p class="card-text">{{$bouquet->description}}</p>
                <a href="/admin/edit-bouquet/{{$bouquet->id}}" class="btn btn-primary">Редагувати</a>
                <a href="#" class="btn btn-danger">Видалити</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection