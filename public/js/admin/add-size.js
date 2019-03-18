
// $('#add_size_button').click(function(){
// 	$(".sizes_cards").append("<p>sdvsdv</p>");
// });
// document.getElementById("add_size_button").click(function(){
// 	$(".sizes_cards").append("<p>sdvsdv</p>");
// 	allert(1);
// });


var content = '<div id="new_size_block" class="mr-2">\
	  <a class="btn btn-danger" onclick="this.parentNode.remove();" id="delete_size_button" href="#" role="button">Видалити</a>\
      <label>Розмір</label>\
      <input type="text" name="size_name[]" required class="form-control">\
      <label>Кількість</label>\
      <input type="number" name="size_count[]" required class="form-control">\
      <label>Висота</label>\
      <input type="number" name="size_height[]" required class="form-control">\
      <label>Діаметр</label>\
      <input type="number" name="size_diameter[]" required class="form-control">\
      <label>Ціна</label>\
      <input type="number" name="price[]" class="form-control">\
      <label >Головне фото</label>\
      <input type="file" class="add_photo_b" name="main_photo[]" multiple accept="image/jpeg" required>\
      <label >При наведені</label>\
      <input type="file" class="add_photo_b" name="hover_photo[]" multiple accept="image/jpeg" required>\
      <label >Додаткове</label>\
      <input type="file" class="add_photo_b" name="add_photo[]" multiple accept="image/jpeg" required>\
    </div>';


$('#add_size_button').click(function(){
  $('#sizes_cards').append(content);
  document.getElementById("save").disabled = false;
});


