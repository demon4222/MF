<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id','desc')->paginate(9);
        return view('layouts.admin.admin-orders',compact('orders'));
    }

    public function storeOrder(Request $request)
    {
        $items_count = count($request->product_name);
        for($i=0; $i<$items_count; $i++)
        {
            $order = Order::create([
                'category' => $request->product_category[$i],
                'product_slug' => $request->product_slug[$i],
                'product_name' => $request->product_name[$i],
                'product_size_id' => $request->product_size[$i],
                'product_price' => $request->product_price[$i],
                'qty' => $request->product_count[$i],
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
        return redirect()->route('cart.index')->with('success_message','Ваше замовлення оформленно! Очікуйте на дзвінок.');
    }

    public function done($id)
    {
        Order::where(['id' => $id])->update(['isComplete' => 1]);
        return back();
    }
}
