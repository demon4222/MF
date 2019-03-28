<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\BouquetType;
use App\Models\FlowerCategory;
use App\Models\Bouquet;

class CartController extends Controller
{
    public function index()
    {
        $types = BouquetType::all();
        $flowerCategory = FlowerCategory::all();
        return view('layouts.cart', compact('types','flowerCategory'));
    }

    public function storeBouquet(Request $request)
    {
        Cart::add($request->id.'bouquet'.$request->size_id, $request->name, 1, $request->price, ['size' => $request->size_id])
        ->associate('App\Models\Bouquet');
    
        return redirect()->route('cart.index')->with('success_message','У вас новий товар!');
    }

    public function storeFlower(Request $request)
    {
        Cart::add($request->id.'flower'.$request->height_id, $request->name, 1, $request->price, ['height' => $request->height_id])
        ->associate('App\Models\Flower');

        return redirect()->route('cart.index')->with('success_message','У вас новий товар!');
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
