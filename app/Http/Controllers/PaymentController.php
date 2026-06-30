<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
      public function index()
    {
        $address = Address::where('user_id', Auth::id())->latest()->first();
        $carts = Cart::with('product')
                    ->where('user_id', Auth::id())
                    ->get();

        return view('payment', compact('address','carts'));
    }
}
