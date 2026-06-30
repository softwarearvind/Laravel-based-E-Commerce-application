<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Product List</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Add Product
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>Image</th>

                            <th>User</th>

                            <th>Name</th>

                            <th>Price</th>

                            <th>Discount</th>

                            <th>Stock</th>

                            <th>Status</th>

                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $key => $product)

                        <tr>

                            <td>{{ $key + 1 }}</td>

                            <td>

                                @if($product->image)

                                    <img src="{{ asset('storage/'.$product->image) }}"
                                         width="70"
                                         height="70"
                                         class="rounded">

                                @else

                                    No Image

                                @endif

                            </td>

                            <td>{{ $product->user->name }}</td>

                            <td>{{ $product->name }}</td>

                            <td>₹ {{ number_format($product->price,2) }}</td>

                            <td>{{ $product->discount }}%</td>

                            <td>{{ $product->stock }}</td>

                            <td>

                                @if($product->status)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                           <td class="d-flex gap-2">

    <!-- Edit Icon -->
    <a href="{{ route('products.edit', $product->id) }}"
       class="btn btn-warning btn-sm">
        <i class="bi bi-pencil-square"></i>
    </a>

    <!-- Delete Icon -->
    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure?')">
            <i class="bi bi-trash"></i>
        </button>
    </form>

</td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="9" class="text-center text-danger">

                                No Products Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>
