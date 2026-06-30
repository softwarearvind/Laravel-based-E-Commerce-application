<div class="mb-3">
    <label class="form-label">Product Name</label>

    <input type="text"
           name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $product->name ?? '') }}"
           placeholder="Enter Product Name">

    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@if(isset($product))
<div class="mb-3">
    <label class="form-label">User</label>

    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">

        <option value="">Select User</option>

        @foreach($users as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id', $product->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach

    </select>

    @error('user_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@endif

<div class="mb-3">
    <label class="form-label">Description</label>

    <textarea name="description"
              rows="4"
              class="form-control @error('description') is-invalid @enderror"
              placeholder="Enter Description">{{ old('description', $product->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">Price</label>

        <input type="number"
               step="0.01"
               name="price"
               class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price', $product->price ?? '') }}"
               placeholder="Enter Price">

        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">Discount (%)</label>

        <input type="number"
               name="discount"
               class="form-control @error('discount') is-invalid @enderror"
               value="{{ old('discount', $product->discount ?? '') }}"
               placeholder="Enter Discount">

        @error('discount')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">Stock</label>

        <input type="number"
               name="stock"
               class="form-control @error('stock') is-invalid @enderror"
               value="{{ old('stock', $product->stock ?? '') }}"
               placeholder="Enter Stock">

        @error('stock')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">Status</label>

        <select name="status"
                class="form-select @error('status') is-invalid @enderror">

            <option value="1"
                {{ old('status', $product->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ old('status', $product->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>

        </select>

        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

</div>

<div class="mb-3">

    <label class="form-label">Product Image</label>

    <input type="file"
           name="image"
           class="form-control @error('image') is-invalid @enderror">

    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if(isset($product) && $product->image)
        <div class="mt-3">
            <img src="{{ asset('storage/'.$product->image) }}"
                 width="120"
                 class="img-thumbnail">
        </div>
    @endif

</div>

<div class="d-flex justify-content-between">

    <a href="{{ route('products.index') }}" class="btn btn-secondary">
        Back
    </a>

    <button type="submit" class="btn btn-success">
        {{ isset($product) ? 'Update Product' : 'Save Product' }}
    </button>

</div>
