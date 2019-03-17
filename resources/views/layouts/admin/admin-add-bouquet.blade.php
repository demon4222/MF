@extends('admin')

@section('content')

<form method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Назва букету</label>
    <input type="email" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Фото</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Тип букету</label>
    <select class="form-control" id="bouquetType" onchange="fun1()">
      <option value="none">Виберіть</option>
      @foreach($bouquetTypes as $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group" id="subTypeSelect">
    <label for="exampleFormControlSelect1">Підтип букету</label>
    <select class="form-control" id="bouquetSubType" name="subType">
    </select>
  </div>
  <div class="form-group" id="">
    <label for="exampleFormControlSelect1">Розміри</label><br>
    <a class="btn btn-primary" id="add_size_button" href="#" role="button">Додати розмір</a>
  </div>
  <div class="form-group" id="sizes_cards">

  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Ціна</label>
    <input type="number" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Додати</button>
</form>

@endsection