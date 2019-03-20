@extends('admin')

@section('content')

<a href="/admin/flowers/add-flower" class="b-ghost">Додати квітку</a>

<div class="product-wrapper row">
    @foreach($flowers as $flower)
    <div class="col-md-6 col-lg-4 product-card mb-4">
        <div class="card">
            <a href="#" style="background-image: url('{{asset('/media/flowers/' . $flower->id . '/' . 'm.jpg')}}')">
                <img class="card-img-top" src="{{asset('/media/flowers/' . $flower->id . '/' . 'h.jpg')}}">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{$flower->name}}</h5>
                <p class="card-text">{{$prices[$flower->id]}} <span>грн</span></p>
                <a href="/admin/flowers/edit/{{$flower->id}}" class="btn btn-primary">Редагувати</a>
                <a href="/admin/flowers/delete/{{$flower->id}}" class="btn btn-danger">Видалити</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection