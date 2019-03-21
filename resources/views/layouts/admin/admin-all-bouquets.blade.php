@extends('admin')

@push('scripts')
<link href="{{asset('css/more_options.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endpush

@section('content')

<a href="/admin/add-bouquet" class="b-ghost">Додати букет</a>
<div class="product-wrapper row" style="height:1000px;">
    @foreach($bouquets as $bouquet)
    <div class="col-md-6 col-lg-4 product-card mb-4">
        <div class="card">
            <a href="#" style="background-image: url('{{asset('media/bouquets/' . $bouquet->id . '/g.jpg')}}')">
                <img class="card-img-top" src="{{asset('media/bouquets/' . $bouquet->id . '/' . 'gh.jpg')}}">
            </a>
            <div class="card-body">
                <h5 class="card-title text-center">{{$bouquet->name}}</h5>
                <p class="card-text text-left">{{$prices[$bouquet->id]}} <span>грн</span></p>
                <a href="/admin/edit-bouquet/{{$bouquet->id}}" class="btn btn-primary">Редагувати</a>
                <a href="/admin/all-bouquets/delete/{{$bouquet->id}}" class="btn btn-danger">Видалити</a>
                
                <div class="dropdown">
                <i class=" dropbtn material-icons">more_horiz</i>
                    <div class="dropdown-content">
                    <a href="/admin/add-to-hits/{{$bouquet->id}}">Додати в "Хіти продаж"</a>
                    <a href="#">Link 2</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
<!-- <i class=" dropbtn material-icons" style="float:right;">more_horiz</i> -->