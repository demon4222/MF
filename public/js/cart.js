// class totalEntity{
//     constructor(){
//         this.islimit = false;
//         this.isChangedMin = false;
//         this.isChangedPl = false;
//     }
//     get changedMin(){
//         return this.isChangedMin;
//     }
//     set changedMin(value){
//         this.isChangedMin = value;
//     }
//     get changedPl(){
//         return this.isChangedPl;
//     }
//     set changedPl(value){
//         this.isChangedPl = value;
//     }
//     get limit(){
//         return this.islimit;
//     }
//     set limit(value){
//         this.islimit = value;
//     }
// }
// $totalClass = new totalEntity();

$(document).ready(function(){
    disableTimes();
    // var totalClass = new totalEntity();
    $('.js-btn-minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        if($input.val()!=1)
        {
            var price_id = $(this).attr("data-id");
            var price_elem = document.getElementById('id_items-'+ price_id + '-price');
            var price_for_unit = document.getElementById('item_price-'+price_id).value;
            price_elem.innerHTML = price_for_unit*$input.val()-price_for_unit;
            var total = document.getElementById('total');
            var current_total = Number(total.innerHTML);
            var all_price = document.getElementById('all_price');
            current_total-=Number(price_for_unit);
            all_price.innerHTML = current_total
            var chbox;
            chbox = document.getElementById('selfpick');
            if(!chbox.checked) {
                if (current_total < 350.75) {
                    all_price.innerHTML = current_total + 50;
                    $('#delivery_price').text("50 грн");
                }
            }

            total.innerHTML = current_total;
            var hidden_ptoduct_count = document.getElementById('hidden_product_count');
            hidden_ptoduct_count.value = count;
            var hidden_total_price = document.getElementById('hidden_total_price');
            hidden_total_price.value = current_total;
        }
        $input.val(count);
        $input.change();
        
        return false;
    });
    $('.js-btn-plus').click(function () {
        var $input = $(this).parent().find('input');
        var price_id = $(this).attr("data-id");
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        var price_elem = document.getElementById('id_items-'+ price_id + '-price');
        var price_for_unit = document.getElementById('item_price-'+price_id).value;
        price_elem.innerHTML = price_for_unit*$input.val();
        var total = document.getElementById('total');
        var current_total = Number(total.innerHTML);
        var all_price = document.getElementById('all_price');
        current_total+=Number(price_for_unit);
        all_price.innerHTML = current_total;
        var chbox;
        chbox = document.getElementById('selfpick');
        if(!chbox.checked) {
            if (current_total < 350) {
                all_price.innerHTML = current_total + 50;
            }
            if (current_total > 350) {
                all_price.innerHTML = current_total;
            }
        }
        if(current_total>350)
        {
            $('#delivery_price').text("Безкоштовна");
        }
        // if(current_total>350)
        // {
        //     $totalClass.changedPl = true;
        //     $totalClass.changedMin = false;
        //     $totalClass.limit = true;
        // }
        total.innerHTML = current_total;
        var hidden_ptoduct_count = document.getElementById('hidden_product_count');
        hidden_ptoduct_count.value = $input.val();
        var hidden_total_price = document.getElementById('hidden_total_price');
        hidden_total_price.value = current_total;

        return false;
    });
})

function disableTimes(){
    var dateInput = document.getElementById('datepicker');
   var date = new Date();
   var time = date.getHours();
   var tomorrowDate = date.getDate() + 1;
   newDate = date.getFullYear() + "-" + date.getMonth() + "-" + tomorrowDate;
   if(time>=19)
   {
        dateInput.value = newDate;
   }
   var time1 = document.getElementById('time-courier-1');
   var time2 = document.getElementById('time-courier-2');
   var time3 = document.getElementById('time-courier-3');
   var time4 = document.getElementById('time-courier-4');
   var time5 = document.getElementById('time-courier-5');
   var time6 = document.getElementById('time-courier-6');
   if(dateInput.value != newDate)
   {
        if(time>=9)
        {
            time1.disabled = true;
            time2.checked = true;
        }
        if(time>=11)
        {
            time2.disabled = true;
            time3.checked = true;
        }
        if(time>=13)
        {
            time3.disabled = true;
            time4.checked = true;
        }
        if(time>=15)
        {
            time4.disabled = true;
            time5.checked = true;
        }
        if(time>=17)
        {
            time5.disabled = true;
            time6.checked = true;
        }
    }
}
function changeDate(){
    var time1 = document.getElementById('time-courier-1');
    var time2 = document.getElementById('time-courier-2');
    var time3 = document.getElementById('time-courier-3');
    var time4 = document.getElementById('time-courier-4');
    var time5 = document.getElementById('time-courier-5');
    var time6 = document.getElementById('time-courier-6');
    var today = new Date();
    var current_day = today.getDate();
    var newDate = $('#datepicker').datepicker( "getDate" );
    var newDate_day = newDate.getDate();
    if(newDate_day != current_day)
    {
        time1.disabled = false;
        time2.disabled = false;
        time3.disabled = false;
        time4.disabled = false;
        time5.disabled = false;
        time6.disabled = false;
    }
    else{
        disableTimes();
    }
}
function isSameShipping() {
    var chbox;
    chbox=document.getElementById('id_same_billing_shipping');
    var receiver;
    receiver = document.getElementById('receiver');
    var name = document.getElementById('id_shipping_detail_last_first_name');
    var tel = document.getElementById('id_shipping_detail_phone');
    if(chbox.checked)
    {
        name.required=false;
        tel.required=false;
    }
    else{
        name.setAttribute('required','true');
        tel.setAttribute('required','true');
    }
    if (chbox.checked) {
        receiver.style = "display:none;";
    }
    else {
        receiver.style = "display:block;";
    }
}
function isCourier(){
    var chbox;
    chbox=document.getElementById('courier');
    var selfpick;
    var courierCity;
    var courierAdress;
    selfpick = document.getElementById('selfpickWhere');
    courierCity = document.getElementById('courierCity');
    courierAdress = document.getElementById('courierAddress');
    var address_input = document.getElementById('id_shipping_detail_address');
    if(chbox.checked)
    {
        selfpick.style = "display:none";
        courierCity.style = "display:block;";
        courierAdress.style = "display:block;";
        address_input.setAttribute('required','true');
        var total = document.getElementById('total');
        var current_total = Number(total.innerHTML);
        var all_price = document.getElementById('all_price');
        // if(!$totalClass.limit)
        // {
        //     all_price.innerHTML = current_total+50;
        //     $totalClass.limit = true;
        //     $('#delivery_price').text("50 грн");
        // }
        if(current_total<350)
        {
            all_price.innerHTML = current_total+50;
            $('#delivery_price').text("50 грн");
        }
        total.innerHTML = current_total;

    }
}
function isSelf(){
    var chbox;
    chbox = document.getElementById('selfpick');
    var selfpick;
    var courierCity;
    var courierAdress;
    selfpick = document.getElementById('selfpickWhere');
    courierCity = document.getElementById('courierCity');
    courierAdress = document.getElementById('courierAddress');
    var address_input = document.getElementById('id_shipping_detail_address');
    if(chbox.checked)
    {
        address_input.required=false;
        selfpick.style = "display:block";
        courierCity.style = "display:none;";
        courierAdress.style = "display:none;";
        var total = document.getElementById('total');
        var all_price = document.getElementById('all_price');
        var current_total = Number(total.innerHTML);
            all_price.innerHTML = current_total;
        total.innerHTML = current_total;
        $('#delivery_price').text("Безкоштовна");
    }
}

function makeOrder() {
    var total = document.getElementById('total');
    document.getElementById('hidden_total_price').value( Number(total.innerHTML));
}
