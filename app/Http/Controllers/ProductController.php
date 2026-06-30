<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\User;
class ProductController extends Controller
{
       protected $product;

         public function __construct(ProductRepositoryInterface $product)
         {
              $this->product = $product;
         }

         public function index()
         {
              $products = $this->product->getAll();
                return view('products.index', compact('products'));

         }


            public function create()
            {
                $user = User::all();
                return view('products.create', compact('user'));
            }

 public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:1',
            'discount' => 'required|numeric|min:0|max:100',
            'stock' => 'required|integer|min:0',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,jpeg,png,jfif,webp|max:2048',
        ]);

        $this->product->store($validated);
        return redirect()->route('products.index')->with('success', 'Product Added Successfully');
    }

    public function edit($id)
{
    $product = $this->product->findById($id);
    $users = User::all();
    return view('products.create', compact('product', 'users'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'discount' => 'required',
        'stock' => 'required',
        'status' => 'required',
        'image' => 'nullable|image',
    ]);

    $this->product->update($id, $request->all());
    return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
}


    public function destroy($id)
{
    $this->product->delete($id);

    return redirect()->route('products.index')
        ->with('success', 'Product Deleted Successfully');
}



}
