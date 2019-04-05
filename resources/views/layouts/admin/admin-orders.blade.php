@extends('admin')

@push('scripts')
    <link rel="stylesheet" href="{{asset('css/admin-orders.css')}}">
@endpush

@section('content')

    <section class="block mb-5">
        <div class="orders-wrapper row">
            @foreach($orders as $order)
                <div class="order-item-wrapper my-3 mx-3 col-12">
                    <div class="order-item">
                        <div class="order-item-head text-left pl-2">Замовлення №{{$order->id}}</div>
                        <div class="order-item-status text-right pr-2">
                            @if($order->isComplete)
                                <p class="done-status">Завершено</p>
                            @else
                                <p class="not-done-status">Не виконано</p>
                            @endif
                        </div>
                        <div class="order-item-data-block text-center row">
                            <div class="order-item-data col-md-4 col-sm-12">
                                <div class="order-item-data-title mb-2">Інформація про замовлення</div>
                                <div class="order-item-data-info">
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Назва:</div>
                                        <div class="order-name-value pl-3">{{$order->product_name}}</div>
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Кількість:</div>
                                        <div class="order-name-value pl-3">{{$order->qty}}</div>
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Ціна:</div>
                                        <div class="order-name-value pl-3">{{$order->product_price}} грн</div>
                                    </div>
                                    @if($order->delivery_type=='courier'&&$order->total<350.75)
                                        <div class="order-name-block pl-2">
                                            <div class="order-name-title text-left">Доставка:</div>
                                            <div class="order-name-value pl-3">+50 грн</div>
                                        </div>
                                    @endif
{{--                                    @if($order->categoty=='flower'&&$$order->qty<19&&$order->delivery_type=='courier')--}}
{{--                                        <div class="order-name-block pl-2">--}}
{{--                                            <div class="order-name-title text-left">Доставка:</div>--}}
{{--                                            <div class="order-name-value pl-3">+50 грн</div>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Загально:</div>
                                        <div class="order-name-value pl-3">{{$order->product_price * $order->qty}}грн
                                        </div>
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Посилання:</div>
                                        <div class="order-name-value pl-3">
                                            @if($order->category=='bouquet')
                                                <a href="{{route('bouquet.show', [$order->product_slug, $order->product_size_id])}}">Переглянути</a>
                                            @else
                                                <a href="{{route('flower.show', [$order->product_slug, $order->product_size_id])}}">Переглянути</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-item-data col-md-4 col-sm-12">
                                <div class="order-item-data-title">Інформація про замовника</div>
                                <div class="order-item-data-info">
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Ім'я та фамілія:</div>
                                        <div class="order-name-value pl-3">{{$order->customer_name}}</div>
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Телефон:</div>
                                        <div class="order-name-value pl-3">{{$order->customer_phone}}</div>
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Ім'я отримувача:</div>
                                        <div class="order-name-value pl-3">{{$order->customer_shipping_name}}</div>
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Телефон отримувача:</div>
                                        <div class="order-name-value pl-3">{{$order->customer_shipping_phone}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-item-data col-md-4 col-sm-12">
                                <div class="order-item-data-title">Інформація про доставку</div>
                                <div class="order-item-data-info">
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Тип доставки:</div>
                                        @if($order->delivery_type=='courier')
                                            <div class="order-name-value pl-3">Кур'єрскька</div>
                                        @else
                                            <div class="order-name-value pl-3">Заберу сам</div>
                                        @endif
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Адреса:</div>
                                        <div class="order-name-value pl-3">{{$order->delivery_address}}</div>
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Дата доставки:</div>
                                        <div class="order-name-value pl-3">{{$order->delivery_date}}</div>
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Час доставки:</div>
                                        <div class="order-name-value pl-3">{{$order->delivery_time}}</div>
                                    </div>
                                    <div class="order-name-block pl-2">
                                        <div class="order-name-title text-left">Оплата:</div>
                                        @if($order->payment_method=='on_delivery')
                                            <div class="order-name-value pl-3">при отримані</div>
                                        @else
                                            <div class="order-name-value pl-3">каткою на сайті</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="date-block text-right mt-3 pr-2">
                            <div class="created-at">
                                <label>Дата створення:</label>
                                {{$order->created_at}}
                            </div>
                            @if(!$order->isComplete)
                                <div class="done-block pl-2 pb-1">
                                    <a href="{{route('order.done', $order->id)}}">завершити</a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginator">
            <div class="paginator-block">
                {{$orders->links()}}
            </div>
        </div>
    </section>

@endsection
