<div class="hero">

<div class="container">

<h1>Welcome To E-commerce Store</h1>

<p>Buy Amazing Products With Best Discounts</p>

</div>

</div>

<!-- Products -->

<div class="container">

<div class="row">

@foreach($products as $product)

<div class="col-lg-3 col-md-4 col-sm-6 mb-4">

<div class="card position-relative">

@if($product->stock>0)

<span class="badge bg-success badge-stock">
In Stock
</span>

@else

<span class="badge bg-danger badge-stock">
Out of Stock
</span>

@endif

<img src="{{ asset('storage/'.$product->image) }}" class="card-img-top">

<div class="card-body">

<h5>{{ $product->name }}</h5>

<p>

{{ Str::limit($product->description,60) }}

</p>

@if($product->discount>0)

@php

$newPrice=$product->price-($product->price*$product->discount/100);

@endphp

<div>

<span class="old-price">
₹{{ $product->price }}
</span>

<span class="price">
₹{{ number_format($newPrice,2) }}
</span>

</div>

<div class="badge bg-danger mt-2">

{{ $product->discount }}% OFF

</div>

@else

<div class="price">

₹{{ $product->price }}

</div>

@endif

</div>

<div class="card-footer bg-white">

<a href="{{ route('view.product', ['name' => Str::slug($product->name)]) }}" class="btn btn-primary w-100">
    View Product
</a>

View Product

</a>

</div>

</div>

</div>

@endforeach

</div>

</div>
