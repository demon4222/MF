@extends('admin')

@push('scripts')
<script type="text/javascript" src="{{asset('js/admin/add-height.js')}}"></script>
@endpush

@section('content')

<form method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Назва</label>
    <input type="text" required name="name" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Категорія</label>
    <select class="form-control" name="category" id="category" required>
    <option value="none">Виберіть</option>
      @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label >Для вітрини</label><br/>
    <input type="file" class="add_photo_b" name="main_photo" accept="image/jpeg" required>
  </div>
  <div class="form-group">
    <label >Для вітрини(при наведені)</label><br/>
    <input type="file" class="add_photo_b" name="hover_photo" accept="image/jpeg" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Висота</label><br>
    <a class="btn btn-primary" id="add_height_button" href="#" role="button">Додати висоту</a>
  </div>
  <div class="form-group" id="height_cards">

  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Опис</label>
    <textarea required class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button id="save" type="submit" class="btn btn-success">Додати</button>
</form>

@endsection