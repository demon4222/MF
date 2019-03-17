@extends('admin')

@section('content')

<h1>Новий слайд</h1>
<form method="post" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<p>Фото</p>
	<input type="file" name="photo" multiple accept="image/jpeg" required>
	<p>Опис</p>
	<input type="text" name="description">
	<p>Текст кнопки</p>
	<input type="text" name="button_text"></br>
	<button type="submit">Готово</button>
</form>

@endsection