<!DOCTYPE html>
<html lang="en">
@include('layouts.link')
<body>

<!-- Navbar -->

@include('layouts.navbar')

<!-- Hero -->



<div class="container mt-5">

<div class="row">

<div class="col-lg-7">

<div class="card shadow">

<div class="card-header">

<h4>Select Payment Method</h4>

</div>

<div class="card-body">

<form action="" method="POST">

@csrf

<div class="form-check mb-3">

<input
class="form-check-input"
type="radio"
name="payment_method"
value="cod"
checked>

<label class="form-check-label">

Cash On Delivery

</label>

</div>

<div class="form-check mb-4">

<input
class="form-check-input"
type="radio"
name="payment_method"
value="razorpay">

<label class="form-check-label">

Razorpay

</label>

</div>

<button class="btn btn-success">

Continue

</button>

</form>

</div>

</div>

</div>

<div class="col-lg-5">

<div class="card shadow">

<div class="card-header">

Order Summary

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

<div class="d-flex justify-content-between mb-2">

<span>

{{ $cart->product->name }}

x

{{ $cart->quantity }}

</span>

<strong>

₹{{ $sub }}

</strong>

</div>

@endforeach

<hr>

<h4 class="text-end">

Total : ₹{{ $total }}

</h4>

</div>

</div>

</div>

</div>

</div>



<!-- Footer -->

@include('layouts.footer')

</body>
</html>
