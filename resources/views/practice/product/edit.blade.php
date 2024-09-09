<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    {{-- Error Handling --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Edit Product Form --}}
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Product Name --}}
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                        </div>

                        {{-- Product Description --}}
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        {{-- Product Price --}}
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
                        </div>

                        {{-- Product Quantity --}}
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" required>
                        </div>


                        {{-- Product Status --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        {{-- Submit Button --}}
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>