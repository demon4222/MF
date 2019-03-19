@extends('admin')

@section('content')

<form method="post" enctype="multipart/form-data" action="/admin/edit-bouquet/{{$bouquetData['id']}}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Назва букету</label>
    <input type="text" value="{{$bouquetData['name']}}" name="name" class="form-control" id="exampleFormControlInput1">
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
    <option value="{{$bouquetData['subTypeId']}}"></option>
    </select>
  </div>
  <div class="form-group">
    <label >Для вітрини</label><br/>
    <input type="file" class="add_photo_b" name="general_photo" accept="image/jpeg">
  </div>
  <div class="form-group">
    <label >Для вітрини(при наведені)</label><br/>
    <input type="file" class="add_photo_b" name="general_photo_hover" accept="image/jpeg">
  </div>
  <div class="form-group" id="">
    <label for="exampleFormControlSelect1">Розміри</label><br>
    <a class="btn btn-primary" id="add_size_button" href="#" role="button">Додати розмір</a>
  </div>
  <div class="form-group" id="sizes_cards">
@foreach($bouquetData['sizes'] as $size)
  <div id="new_size_block" class="mr-2">
    <input name="size_id[]" type="hidden" value="{{$size['id']}}">
	  <a class="btn btn-danger" onclick="this.parentNode.remove();" id="delete_size_button" href="/admin/edit-bouquet/delete-size/{{$size['id']}}/{{$bouquetData['id']}}" role="button">Видалити</a>
      <label >Розмір</label>
      <input type="text" value="{{$size['size']}}" required name="size_name[]" class="form-control">
      <label >Кількість</label>
      <input type="number" value="{{$size['count']}}" required name="size_count[]" class="form-control">
      <label >Висота</label>
      <input type="number" value="{{$size['height']}}" required name="size_height[]" class="form-control">
      <label >Діаметр</label>
      <input type="number" value="{{$size['diameter']}}" required name="size_diameter[]" class="form-control">
      <label>Ціна</label>
      <input type="number" value="{{$size['pivot']['price']}}" required name="price[]" class="form-control">
      <label >Головне фото</label>
      <input type="file" class="add_photo_b" name="main_photo[]"  accept="image/jpeg">
      <label >При наведені</label>
      <input type="file" class="add_photo_b" name="hover_photo[]" accept="image/jpeg">
      <label >Додаткове</label>
      <input type="file" class="add_photo_b" name="add_photo[]" accept="image/jpeg">
    </div>
@endforeach
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Опис</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$bouquetData['description']}}</textarea>
  </div>
  <button type="submit" class="btn btn-success">Зберегти</button>
</form>

@endsection