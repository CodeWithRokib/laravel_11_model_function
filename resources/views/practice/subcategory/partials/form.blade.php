<div class="col-md-6 mb-4">
    <div class="custom-form-group">
        {{html()->label('Sub Category Name', 'name')}}
        {{html()->text('name')->class('form-control form-control-sm'. ($errors->has('name') ? 'is-invalid' : ''))->placeholder(__('Enter subcategory name'))}}

    </div>
</div>

    </div>

    {{-- Category Selection --}}
    <div class="form-group mb-3">
        {!! html()->label('Category', 'category_id') !!}
        {{ html()->select('category_id', $categories->pluck('name', 'id'))
            ->placeholder('Select a category')
            ->class('form-control form-control-sm'. ($errors->has('name') ? 'is-invalid' : ''))->placeholder(__('Enter subcategory name'))}}
    </div>


{!! html()->form()->close() !!}
