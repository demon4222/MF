@extends('layouts.layoutMain')

@push('styles')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="{{asset('js/datepicker-ru.js')}}"></script>
  <script>
      var today = new Date();
  $( function() {    
    $('#datepicker').datepicker({
	dateFormat : "yy-mm-dd",
	minDate: new Date($('#hiddendelivdate').val()),
	monthNames : ['Січень','Лютий','Березень','Квітень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Декабрь'],
    dayNamesMin : ['Нд','Пн','Вт','Ср','Чт','Пт','Сб'],
    defaultDate: today,
});
var hour = today.getHours();
if(hour>=19){
    today.setDate(today.getDate() + 1);
}
$( "#datepicker" ).datepicker( "option", "minDate", today  );
$( "#datepicker" ).datepicker( "option", "maxDate", "+2w"  );
$('#datepicker').datepicker("setDate", today );
  } );
  </script>
  <script src="{{asset('js/cart.js')}}"></script>
@endpush

@push('hidden')



@endpush

@section('content')
<section style="padding-left:15px; padding-right:15px;">
      

    <form>
        <div class="card-wrapper row">
            <div class="data-slot col-md-4">
                <div class="data-slot_title">Ваші данні:</div>
                <div class="data-slot_customer">
                    <div class="ds-input">
                        <label class="ds-input_title">Ім'я та фамілія:</label>
                        <div class="ds-input_message">обов'язкове поле</div>
                        <input type="text" class="ds-input_input">
                    </div>
                    <div class="ds-input">
                        <label class="ds-input_title">Email:</label>
                        <div class="ds-input_message">обов'язкове поле</div>
                        <input type="email" class="ds-input_input">
                    </div>
                    <div class="ds-input">
                        <label class="ds-input_title">Телефон:</label>
                        <div class="ds-input_message">обов'язкове поле</div>
                        <input type="number" class="ds-input_input">
                    </div>
                    <div class="ds-message">Усі поля обов'язкові для заповнення..</div>
                </div>
                <div class="data-slot_who">
                    <div class="data-slot_title">Інформація про отримувача</div>
                    <div class="ls-checkbox">
                        <input class="elip" onchange="isSameShipping()" id="id_same_billing_shipping" name="same_billing_shipping" type="checkbox">
                        <label for="id_same_billing_shipping" style="font-size:1.25rem;">Я получатель</label>
                    </div>
                    <div id="receiver">
                        <div class="ds-input">
                            <label class="ds-input_title">Имя:</label>
                            <div class="ds-input_message">обов'язкове поле</div>
                            <input class="ds-input_input" id="id_shipping_detail_last_first_name" maxlength="200" name="shipping_detail_last_first_name" type="text" required="">
                        </div>
                        <div class="ds-input">
                            <label class="ds-input_title">Телефон</label>
                            <div class="ds-input_message">обов'язкове поле</div>
                            <input class="ds-input_input elip" id="id_shipping_detail_phone" maxlength="20" name="shipping_detail_phone" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="data-slot col-md-4">
                <div class="data-slot_title">Доставка</div>
                <div class="data-slot_subtitle" style="margin-top:2.25rem;">Тип доставки</div>
                <div class="delivery-type-select">
                    <div class="ls-radio mr-3">
                        <input id="selfpick" onchange="isSelf()" type="radio" class="elip" name="shipping_type" value="self">
                        <label for="selfpick">Самовывоз</label>
                    </div>
                    <div class="ls-radio">
                        <input id="courier" onchange="isCourier()" type="radio" class="elip" name="shipping_type" value="courier" checked="">
                        <label for="courier">Курьерская доставка</label>
                    </div>
                </div>
                <div class="selfpick_date ">
                    <div class="ds-input">
                        <label class="data-slot_subtitle ">Виберіть дату</label>
                        <div class="datepicker-wrapper">
                            <div ><input style="width:100%;" onchange="changeDate()" class="ds-input_input" type="text" id="datepicker"></div>
                        </div>
                    </div>
                </div>
                <div class="courier mt-5">
                    <div class="courier_time">
                        <div class="data-slot_subtitle">Виберіть час</div>
                        <div class="data-slot_intervals">
                            <div class="ls-time">
                                <input id="time-courier-1" type="radio" class="elip" name="time_courier" value="7" checked="">
                                <label for="time-courier-1">09 - 11</label>
                            </div>
                            <div class="ls-time">
                                <input id="time-courier-2" type="radio" class="elip" name="time_courier" value="8">
                                <label for="time-courier-2">11 - 13</label>
                            </div>
                            <div class="ls-time">
                                <input id="time-courier-3" type="radio" class="elip" name="time_courier" value="9">
                                <label for="time-courier-3">13 - 15</label>
                            </div>
                            <div class="ls-time">
                                <input id="time-courier-4" type="radio" class="elip" name="time_courier" value="10">
                                <label for="time-courier-4">15 - 17</label>
                            </div>
                            <div class="ls-time">
                                <input id="time-courier-5" type="radio" class="elip" name="time_courier" value="11">
                                <label for="time-courier-5">17 - 19</label>
                            </div>
                            <div class="ls-time">
                                <input id="time-courier-6" type="radio" class="elip" name="time_courier" value="12">
                                <label for="time-courier-6">19 - 21</label>
                            </div>
                        </div>
                    </div>
                    <div class="courier_city mt-4" id="courierCity">
                        <div class="data-slot__subtitle">Місто доставки</div>
                        <div class="ls-radio">
                            <input id="d-kiev" class="elip" type="radio" name="shipping_detail_city" value="vinnitsa" checked="">
                            <label style="font-size: 1.25rem; margin-left:5px;">Вінниця</label>
                        </div>
                    </div>
                    <div class="courier_address mt-3" id="courierAddress">
                        <div class="ds-input">
                            <label class="ds-input_title">Адресса:</label>
                            <div class="ds-input_message">обов'язкове поле</div>
                            <input class="ds-input_input elip" id="id_shipping_detail_address" maxlength="400" name="shipping_detail_address" type="text">
                        </div>
                    </div>
                </div>
                <div class="selfpick_where" id="selfpickWhere" style="display:none;">
                    <div class="data-slot_subtitle mt-3">Заберу букет по адресу:</div>
                    <div class="ls-radio mt-2">
                        <input id="addr1" class="elip" type="radio" name="shipping_detail_self_point" value="point_1" checked="">
                        <label for="addr1">Адресса</label>
                    </div>
                </div>
            </div>
            <div class="data-slot col-md-4">
                <div class="data-slot_title">Оплата:</div>
                <div class="data-slot_subtitle">Способ оплаты</div>
                <div class="payment">
                    <div class="ls-radio">
                        <input id="cash" class="elip" type="radio" name="billing_detail_payment_type" value="on_delivery" checked="">
                        <label for="cash">Оплата при доставке</label>
                    </div>
                    <div class="ls-radio">
                        <input id="card" class="elip" type="radio" name="billing_detail_payment_type" value="card">
                        <label for="card">Оплата картой на сайте</label>
                    </div>            
                </div>
                <div class="comment">
                    <div class="data-slot_subtitle">Примечание к заказу</div>
                    <textarea class="elip" cols="30" id="id_additional_instructions" name="additional_instructions" rows="5" v-model="test"></textarea>
                </div>
                <div class="need-help">
                    <div class="data-slot_subtitle mb-3">Нужна помощь?</div>
                    <div class="need-help_message mb-1">
                        Телефон службы поддержки:
                    </div>
                    <a class="need-help_phone" href="tel:380444922838">+380 (67) 311 33 55</a>
                </div>
                <div class="make-order">
                    <input type="hidden" name="complete_order" value="Оформить заказ">
                    <input type="submit" name="complete_order" class="btn-main-flx bttn-card" value="Оформить заказ">
                </div>
            </div>
        </div>
    </form>
</section>
@endsection