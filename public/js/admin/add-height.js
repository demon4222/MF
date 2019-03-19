
var content = '<div id="new_height_block" class="mr-2">\
	  <a class="btn btn-danger" onclick="this.parentNode.remove();f1();" id="delete_heigth_button" href="#" role="button">Видалити</a><br/>\
      <label>Висота</label>\
      <input type="number" name="height[]" required class="form-control">\
      <label>Ціна</label>\
      <input type="number" name="price[]" required class="form-control">\
    </div>';


$('#add_height_button').click(function(){
  $('#height_cards').append(content);
    document.getElementById("save").disabled = false;
});
function f1(){
    if($("#new_height_block").length == 0)
    {
        document.getElementById("save").disabled = true;
    }
}
// $('#save').click(function(event){
//   var elem = document.getElementById("category");
//   var elemValue = elem.options[elem.selectedIndex].value;
//   if(elemValue == "none")
//   {
//     event.preventDefault();
//     alert("Виберіть Категорію");
//   }
// });
