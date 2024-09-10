
<div class="container">
    <h1>Edit Subcategory</h1>

    {{-- Display validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Subcategory Edit Form --}}
    <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Subcategory Name --}}
        <div class="form-group mb-3">
            <label for="name">Subcategory Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $subcategory->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Category Selection --}}
        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                <option value="" disabled>Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $subcategory->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Update Subcategory</button>
    </form>
</div>

