function getForm(id, old_price){
    document.getElementById('bouquet-id').value = id;
    document.getElementById('bouquet_day_form').style = "display:block;";
    document.getElementById('wrapper').style = "opacity:0.2;";
    // document.getElementById('bouquet_day_form').style = "opacity:1;";
    $('#old_price').text(old_price);
}

$('#discount_input').keyup(function(){
    var old_price = Number($('#old_price')[0].innerHTML);
    var discount = $('#discount_input').val();
    var new_price = old_price - ((discount/100)*old_price);
    $('#new_price').text(new_price);
});

$('.close-button').click(function(){
    document.getElementById('bouquet_day_form').style = "display:none;";
    document.getElementById('wrapper').style = "opacity:1;";
});