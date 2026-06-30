<?php

namespace App\Http\Controllers;
use App\Models\Address;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'phone'    => 'required',
            'email'    => 'required|email',
            'address'  => 'required',
            'state'    => 'required',
            'city'     => 'required',
            'pincode'  => 'required',
        ]);

        Address::create([
            'user_id'  => Auth::id(),
            'name'     => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'address'  => $request->address,
            'state'    => $request->state,
            'city'     => $request->city,
            'pincode'  => $request->pincode,
        ]);

        return redirect()->route('payment')->with('success', 'Address saved successfully.');
    }
}
