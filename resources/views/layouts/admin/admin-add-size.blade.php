<form>
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Розмір (S, M, L...)</label>
    <input type="text" required class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Кількість</label>
    <input type="number" required class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Висота</label>
    <input type="text" required class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Ширина</label>
    <input type="text" required class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
  	<label for="exampleFormControlInput1">Головне фото</label>
	<input type="file" name="photo" multiple accept="image/jpeg" required>
  </div>
  <div class="form-group">
  	<label for="exampleFormControlInput1">При наведені</label>
	<input type="file" name="photo" multiple accept="image/jpeg" required>
  </div>
  <div class="form-group">
  	<label for="exampleFormControlInput1">Додаткове</label>
	<input type="file" name="photo" multiple accept="image/jpeg" required>
  </div>
</form>