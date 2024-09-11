
    {{-- Subcategory Name --}}
    <div class="form-group mb-3">
        {!! html()->label('Subcategory Name', 'name') !!}
        {!! html()->text('name')
            ->class('form-control' . ($errors->has('name') ? ' is-invalid' : ''))
            ->value(old('name')) !!}
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Category Selection --}}
    <div class="form-group mb-3">
        {!! html()->label('Category', 'category_id') !!}
        {!! html()->select('category_id', $categories->pluck('name', 'id'))
            ->placeholder('Select a category')
            ->class('form-control' . ($errors->has('category_id') ? ' is-invalid' : ''))
            ->value(old('category_id')) !!}
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


{!! html()->form()->close() !!}
