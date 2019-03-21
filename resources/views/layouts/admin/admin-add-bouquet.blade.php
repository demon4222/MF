@extends('admin')

@push('scripts')
<script type="text/javascript" src="{{asset('js/admin/bouquetSubTypes.js')}}"></script>

<script type="text/javascript" src="{{asset('js/admin/add-size.js')}}"></script>
@endpush


@section('content')

<form method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Назва букету</label>
    <input type="text" required name="name" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Тип букету</label>
    <select class="form-control" id="bouquetType" onchange="fun1()" required="required">
      <option value="none">Виберіть</option>
      @foreach($bouquetTypes as $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group" id="subTypeSelect">
    <label for="exampleFormControlSelect1">Підтип букету</label>
    <select required="required" class="form-control" id="bouquetSubType" name="subType">
    </select>
  </div>
  <div class="form-group">
    <label >Для вітрини</label><br/>
    <input type="file" class="add_photo_b" name="general_photo" accept="image/jpeg" required>
  </div>
  <div class="form-group">
    <label >Для вітрини(при наведені)</label><br/>
    <input type="file" class="add_photo_b" name="general_photo_hover" accept="image/jpeg" required>
  </div>
  <div class="form-group" id="">
    <label for="exampleFormControlSelect1">Розміри</label><br>
    <a class="btn btn-primary" id="add_size_button" href="#" role="button">Додати розмір</a>
  </div>
  <div class="form-group" id="sizes_cards">

  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Опис</label>
    <textarea required class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button id="save" type="submit" class="btn btn-success">Додати</button>
</form>

@endsection