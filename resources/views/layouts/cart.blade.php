@extends('layouts.layoutMain')

@push('styles')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endpush

@section('content')
<section class="block">
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
                        <input class="elip" id="id_same_billing_shipping" name="same_billing_shipping" type="checkbox">
                        <label for="id_same_billing_shipping">Я получатель</label>
                    </div>
                    <div id="receiver" style="display: block;">
                        <div class="ds-input">
                            <label class="ds-input_title">Имя:</label>
                            <div class="ds-input_message">обязательное поле</div>
                            <input class="ds-input_input" id="id_shipping_detail_last_first_name" maxlength="200" name="shipping_detail_last_first_name" type="text" required="">
                        </div>
                        <div class="ds-input">
                            <label class="ds-input_title">Телефон</label>
                            <div class="ds-input_message">обязательное поле</div>
                            <input class="ds-input_input elip" id="id_shipping_detail_phone" maxlength="20" name="shipping_detail_phone" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="data-slot col-md-4"></div>
            <div class="data-slot col-md-4"></div>
        </div>
    </form>
</section>
@endsection