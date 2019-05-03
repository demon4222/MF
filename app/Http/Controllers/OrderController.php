<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(9);
        return view('layouts.admin.admin-orders', compact('orders'));
    }

    public function storeOrder(Request $request)
    {
        $total = Cart::total();
        foreach(Cart::content() as $item)
        {
            Order::create([
                'category' => $item->options->category,
                'product_slug' => $item->model->slug,
                'product_name' => $item->name,
                'product_size_id' => $item->options->size,
                'product_price' => $item->price,
                'qty' => $item->qty,
                'total' => $total,
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_shipping_name' => $request->shipping_detail_last_first_name,
                'customer_shipping_phone' => $request->shipping_detail_phone,
                'delivery_type' => $request->shipping_type,
                'delivery_date' => $request->shipping_date,
                'delivery_time' => $request->time_courier,
                'delivery_address' => $request->shipping_detail_address,
                'payment_method' => $request->billing_detail_payment_type,
                'add_info' => $request->additional_instructions,
            ]);
        }

        Cart::destroy();
        \App\Http\Controllers\TelegramBotController::sendMessage();
        return redirect()->route('cart.index')->with('success_message', 'Ваше замовлення оформленно! Очікуйте на дзвінок.');
    }

    public function done($id)
    {
        Order::where(['id' => $id])->update(['isComplete' => 1]);
        return back();
    }
}
