@extends('admin')

@push('scripts')
<script type="text/javascript" src="{{asset('js/admin/add-height.js')}}"></script>
@endpush

@section('content')
<form method="post" enctype="multipart/form-data" action="/admin/flowers/edit">
  {{ csrf_field() }}
  <div class="form-group">
    <input hidden value="{{$data['flower_id']}}" name="flower_id">
    <label for="exampleFormControlInput1">Назва</label>
    <input type="text" value="{{$data['name']}}" name="name" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Категорія</label>
    <select class="form-control" name="category" id="category">
    <option value="{{$data['category']}}">Виберіть</option>
      @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label >Для вітрини</label><br/>
    <input type="file" class="add_photo_b" name="main_photo" accept="image/jpeg">
  </div>
  <div class="form-group">
    <label >Для вітрини(при наведені)</label><br/>
    <input type="file" class="add_photo_b" name="hover_photo" accept="image/jpeg">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Висота</label><br>
    <a class="btn btn-primary" id="add_height_button" href="#" role="button">Додати висоту</a>
  </div>
  <div class="form-group" id="height_cards">
  @foreach($data['heights'] as $height)
    <div id="new_height_block" class="mr-2">
	  <a class="btn btn-danger" onclick="this.parentNode.remove();f1();" id="delete_heigth_button" href="#" role="button">Видалити</a><br/>
      <label>Висота</label>
      <input type="number" value="{{$height['height']}}" name="height[]" required class="form-control">
      <label>Ціна</label>
      <input type="number" value="{{$height['pivot']['price']}}" name="price[]" required class="form-control">
    </div>
    @endforeach
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Опис</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$data['description']}}</textarea>
  </div>
  <button id="save" type="submit" class="btn btn-success">Зберегти</button>
</form>

@endsection