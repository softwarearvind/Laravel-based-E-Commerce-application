<?php
namespace App\Repositories;
use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class  ProductRepository implements ProductRepositoryInterface
{
   public function getAll()
   {
       return Product::latest()->get();
   }

   public function findById($id)
   {
       return Product::find($id);
   }

  public function store(array $data)
{
    if (isset($data['image'])) {

        $image = $data['image'];
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('products', $imageName, 'public');
        $data['image'] = 'products/' . $imageName;
    }
     $data['user_id'] = Auth::id();

    return Product::create($data);
}

   public function update($id, array $data)
   {
       $product = $this->findById($id);
       $product->update($data);
       return $product;
   }


   public function delete($id)
{
    $product = Product::findOrFail($id);

    // Delete image from storage
    if ($product->image && Storage::disk('public')->exists($product->image)) {
        Storage::disk('public')->delete($product->image);
    }

    // Delete database record
    return $product->delete();
}


}
