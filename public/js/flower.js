
$(document).ready(function(){
    $('#js-btn-minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        if($input.val()!=1)
        {
            var price_for_unit = document.getElementById('price_unit').value;
            var total = document.getElementById('total');
            var current_total = Number(parseInt(total.innerHTML));
            current_total-=Number(price_for_unit);
            total.innerHTML = current_total + ' грн';
        }
        $input.val(count);
        $input.change(); 
        document.getElementById('qty').val($input.val());      
        return false;
    });
    $('#js-btn-plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        var price_elem = document.getElementById('total');
        var price_for_unit = document.getElementById('price_unit').value;
        price_elem.innerHTML = price_for_unit*$input.val() + ' грн';
        document.getElementById('qty').value = $input.val();
        return false;
    });
})