@extends('admin')

@push('scripts')
<link href="{{asset('css/more_options.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/admin/add-bouquet-of-the-day-form.js')}}"></script>
<link href="{{asset('css/bouquet-of-the-day-form.css')}}" rel="stylesheet">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
@endpush

@section('hidden')
<div id="bouquet_day_form">
        <form method="post" action="/admin/add-bouquet-of-the-day">
            @csrf
            <div class="col-auto mt-3">
                <input hidden name="bouquet_id" id="bouquet-id">
                <a href="#" class="close-button"><i class='fas fa-window-close' style='font-size:24px;color:red'></i></a>
                <input type="number" name="discount" class="form-control mb-2" id="discount_input" placeholder="Знижка у %">
                <label>Стара ціна: <p id="old_price"></p></label><br/>
                <label>Нова ціна: <p id="new_price"></p></label>
            </div>
              <div class="col-auto text-center mt-1">
                <button type="submit" class="btn btn-success mb-2">Встановити</button>
              </div>
            </div>
        </form>
    </div>
@endsection

@section('content')

<a href="/admin/add-bouquet" class="b-ghost">Додати букет</a>
<div class="product-wrapper row" style="height:1000px;">
    @foreach($bouquets as $bouquet)
    <div class="col-md-6 col-lg-4 product-card mb-4">
        <div class="card">
            <a href="#" style="background-image: url('{{asset('media/bouquets/' . $bouquet->id . '/g.jpg')}}')">
                <img class="card-img-top" src="{{asset('media/bouquets/' . $bouquet->id . '/' . 'gh.jpg')}}">
                @if($bouquet->bouquet_of_the_day)
                <p class="day text-uppercase">пропозиція дня</p>
                @endif
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
                    <a href="#" onclick="getForm({{$bouquet->id}},{{$prices[$bouquet->id]}});">Пропозиція дня</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
<!-- <i class=" dropbtn material-icons" style="float:right;">more_horiz</i> -->