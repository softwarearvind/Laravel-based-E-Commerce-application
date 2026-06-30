<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
     public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $id)
                    ->first();

        if ($cart) {

            $cart->increment('quantity');

        } else {

            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $id,
                'quantity'   => 1,
            ]);
        }

        return back()->with('success','Product added to cart.');
    }

    public function index()
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('cart', compact('carts'));
    }
}
