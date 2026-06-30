<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h4>Add Product</h4>
                </div>

                <div class="card-body">

                   <form
    action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    @if(isset($product))
        @method('PUT')
    @endif

                    @include('products.form')

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
