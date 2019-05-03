<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\BouquetType;
use App\Models\FlowerCategory;

class CartController extends Controller
{
    public function index()
    {
        return view('layouts.cart');
    }

    public function storeBouquet(Request $request)
    {
        Cart::add($request->id.'bouquet'.$request->size_id, $request->name, 1, $request->price, ['size' => $request->size_id, 'category' => 'bouquet'])
            ->associate('App\Models\Bouquet');

        return redirect()->route('cart.index')->with('success_message','У вас новий товар!');
    }

    public function storeFlower(Request $request)
    {
        Cart::add($request->id.'flower'.$request->height_id, $request->name, $request->qty, $request->price, ['size' => $request->height_id, 'category' => 'flower'])
            ->associate('App\Models\Flower');

        return redirect()->route('cart.index')->with('success_message','У вас новий товар!');
    }

    public function addProductAjax(Request $request)
    {
        $item = Cart::get($request->rowId);
        Cart::update($request->rowId, $item->qty + 1);
        return response()->json();
    }

    public function subProductAjax(Request $request)
    {
        $item = Cart::get($request->rowId);
        Cart::update($request->rowId, $item->qty - 1);
        return response()->json();
    }

    public function empty()
    {
        Cart::destroy();
        return redirect()->route('cart.index');
    }

    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message','Товар видалено!');
    }
}
