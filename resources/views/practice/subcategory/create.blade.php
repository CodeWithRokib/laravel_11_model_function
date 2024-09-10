
<div class="container">
    <h1>Create Subcategory</h1>

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

    {{-- Subcategory Creation Form --}}
    <form action="{{ route('subcategories.store') }}" method="POST">
        @csrf

        {{-- Subcategory Name --}}
        <div class="form-group mb-3">
            <label for="name">Subcategory Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Category Selection --}}
        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="" disabled selected>Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Create Subcategory</button>
    </form>
</div>

