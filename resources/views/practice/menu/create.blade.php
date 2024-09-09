
<div class="container">
    <h1 class="my-4">Create Menu</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Menu ID</label>
            <input type="number" name="manu_id" id="menu_id" class="form-control @error('manu_id') is-invalid @enderror" value="{{ old('menu_id') }}" required>
            @error('menu_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <label for="name">Menu Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="route">Route</label>
            <input type="text" name="route" id="route" class="form-control @error('route') is-invalid @enderror" value="{{ old('route') }}" required>
            @error('route')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="icon">Icon</label>
            <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon') }}" required>
            @error('icon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="sort_order">Sort Order</label>
            <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order') }}" required>
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Menu</button>
    </form>
</div>

