<!DOCTYPE html>
<html lang="en">
@include('layouts.link')
<body>

<!-- Navbar -->

@include('layouts.navbar')

<!-- Hero -->
@if(session('success'))

<div class="alert alert-success alert-dismissible fade show mt-3">

    {{ session('success') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif

<div class="container mt-5">

<div class="product-card">

<div class="row">

<!-- Image -->

<div class="col-md-5">

<img src="{{ asset('storage/'.$product->image) }}"
class="product-image">

</div>

<!-- Details -->

<div class="col-md-7">

<h2>{{ $product->name }}</h2>

<hr>

@if($product->discount>0)

@php

$newPrice = $product->price - ($product->price * $product->discount /100);

@endphp

<h3>

<span class="old-price">
₹{{ $product->price }}
</span>

<span class="price">
₹{{ number_format($newPrice,2) }}
</span>

</h3>

<p class="discount">

{{ $product->discount }}% OFF

</p>

@else

<h3 class="price">

₹{{ $product->price }}

</h3>

@endif

@if($product->stock>0)

<p class="stock">

<i class="bi bi-check-circle-fill"></i>

In Stock ({{ $product->stock }} Available)

</p>

@else

<p class="text-danger">

Out Of Stock

</p>

@endif

<h5>Description</h5>

<p>

{{ $product->description }}

</p>

<div class="mb-3">

<label>Quantity</label>

<input
type="number"
class="form-control"
name="qty"
value="1"
min="1"
max="{{ $product->stock }}"
style="width:120px;">

</div>

<div class="row">

<div class="col-md-6">

<form action="{{ route('cart.add', $product->id) }}" method="POST">

@csrf

<button class="btn btn-warning btn-cart">

<i class="bi bi-cart-plus"></i>

Add To Cart

</button>

</form>

</div>

<div class="col-md-6">

<a href="#" class="btn btn-success btn-buy">

<i class="bi bi-lightning-fill"></i>

Buy Now

</a>

</div>

</div>

<hr>

<div class="row text-center mt-4">

<div class="col-md-4">

<i class="bi bi-truck fs-2 text-primary"></i>

<p>Free Delivery</p>

</div>

<div class="col-md-4">

<i class="bi bi-shield-check fs-2 text-success"></i>

<p>Secure Payment</p>

</div>

<div class="col-md-4">

<i class="bi bi-arrow-repeat fs-2 text-danger"></i>

<p>7 Days Return</p>

</div>

</div>

</div>

</div>

</div>

</div>

<!-- Footer -->

@include('layouts.footer')

</body>
</html>
