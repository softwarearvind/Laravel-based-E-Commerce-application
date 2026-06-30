<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;


class FrountedController extends Controller
{
    public function index()
    {
     $products = Product::where('status',1)->latest()->get();
        return view('welcome', compact('products'));
    }

    public function viewProduct($name)
{
    $product = Product::all()->first(function ($product) use ($name) {
        return Str::slug($product->name) === $name;
    });

    abort_if(!$product, 404);

    return view('viewproduct', compact('product'));
}
}
