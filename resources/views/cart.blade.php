<!DOCTYPE html>
<html lang="en">
@include('layouts.link')

<style>

.stepper{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin:40px 0;
}

.step{
    flex:1;
    text-align:center;
    position:relative;
}

.step::after{
    content:'';
    position:absolute;
    top:20px;
    left:55%;
    width:90%;
    height:3px;
    background:#ddd;
}

.step:last-child::after{
    display:none;
}

.circle{

    width:42px;
    height:42px;
    line-height:42px;
    border-radius:50%;
    background:#d9d9d9;
    color:#333;
    margin:auto;
    font-weight:bold;

}

.active .circle{

    background:#00b894;
    color:white;

}

.active h6{

    color:#00b894;

}

.card{

    border:none;
    border-radius:12px;

}

.product-img{

    width:70px;
    height:70px;
    object-fit:cover;

}

.summary-row{

    display:flex;
    justify-content:space-between;
    margin-bottom:10px;

}
</style>
<body>

<!-- Navbar -->

@include('layouts.navbar')

<!-- Hero -->


<div class="container">

<!-- STEP -->

<div class="stepper">

<div class="step active">

<div class="circle">1</div>

<h6 class="mt-2">Shipping</h6>

</div>

<div class="step">

<div class="circle">2</div>

<h6 class="mt-2">Delivery</h6>

</div>

<div class="step">

<div class="circle">3</div>

<h6 class="mt-2">Payment</h6>

</div>

<div class="step">

<div class="circle">4</div>

<h6 class="mt-2">Review</h6>

</div>

</div>

<div class="row">

<!-- LEFT -->

<div class="col-lg-7">

<div class="card shadow">

<div class="card-header bg-white">

<h4>

<i class="bi bi-geo-alt-fill"></i>

Shipping Address

</h4>

</div>

<div class="card-body">

<form action="{{ route('checkout.store') }}" method="POST">

@csrf

<div class="row">

<div class="col-md-6 mb-3">

<label>Name</label>

<input type="text"
name="name"
class="form-control"
value="{{ auth()->user()->name }}">

</div>

<div class="col-md-6 mb-3">

<label>Phone</label>

<input type="text"
name="phone"
class="form-control">

</div>

<div class="col-md-12 mb-3">

<label>Email</label>

<input type="email"
name="email"
class="form-control"
value="{{ auth()->user()->email }}">

</div>

<div class="col-md-12 mb-3">

<label>Address</label>

<textarea
name="address"
rows="3"
class="form-control"></textarea>

</div>

<div class="col-md-4">

<label>State</label>

<input
type="text"
name="state"
class="form-control">

</div>

<div class="col-md-4">

<label>City</label>

<input
type="text"
name="city"
class="form-control">

</div>

<div class="col-md-4">

<label>Pincode</label>

<input
type="text"
name="pincode"
class="form-control">

</div>

</div>

</div>

</div>

</div>

<!-- RIGHT -->

<div class="col-lg-5">

<div class="card shadow">

<div class="card-header bg-white">

<h4>

<i class="bi bi-cart-fill"></i>

Order Summary

</h4>

</div>

<div class="card-body">

@php

$total=0;

@endphp

@foreach($carts as $cart)

@php

$sub=$cart->product->price*$cart->quantity;

$total+=$sub;

@endphp

<div class="d-flex mb-3">

<img
src="{{ asset('storage/'.$cart->product->image) }}"
class="product-img rounded">

<div class="ms-3">

<strong>

{{ $cart->product->name }}

</strong>

<br>

Qty :

{{ $cart->quantity }}

<br>

₹{{ number_format($sub,2) }}

</div>

</div>

@endforeach

<hr>

<div class="input-group mb-3">

<input
type="text"
class="form-control"
placeholder="Coupon Code">

<button
class="btn btn-success">

Apply

</button>

</div>

<div class="summary-row">

<span>Subtotal</span>

<strong>

₹{{ number_format($total,2) }}

</strong>

</div>

<div class="summary-row">

<span>Shipping</span>

<strong>

FREE

</strong>

</div>

<div class="summary-row">

<span>GST</span>

<strong>

₹0

</strong>

</div>

<hr>

<div class="summary-row">

<h5>Grand Total</h5>

<h5>

₹{{ number_format($total,2) }}

</h5>

</div>

<button
type="submit"
class="btn btn-success w-100 btn-lg mt-3">

Continue To Payment

</button>

</form>

</div>

</div>

</div>

</div>

</div>

<!-- Footer -->

@include('layouts.footer')

</body>
</html>
