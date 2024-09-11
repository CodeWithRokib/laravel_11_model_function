<div class="col-md-6 mb-4">
    <div class="custom-form-group">
        {{html()->label('Product Name', 'name')}}
        {{html()->text('name')->class('form-control form-control-sm'. ($errors->has('name') ? 'is-invalid' : ''))->placeholder(__('Enter product name'))}}

    </div>
</div>


<div class="col-md-6 mb-4">
    <div class="custom-form-group">
        {{html()->label('Product description', 'description')}}
        {{html()->number('description')->class('form-control form-control-sm'. ($errors->has('description') ? 'is-invalid' : ''))->placeholder(__('Enter product description'))}}

    </div>
</div>

<div class="col-md-6 mb-4">
    <div class="custom-form-group">
        {{html()->label('Product price', 'price')}}
        {{html()->number('price')->class('form-control form-control-sm'. ($errors->has('price') ? 'is-invalid' : ''))->placeholder(__('Enter product price'))}}

    </div>
</div>

<div class="col-md-6 mb-4">
    <div class="custom-form-group">
        {{html()->label('Product quantity', 'quantity')}}
        {{html()->text('quantity')->class('form-control form-control-sm'. ($errors->has('quantity') ? 'is-invalid' : ''))->placeholder(__('Enter product quantity'))}}

    </div>
</div>

<div class="form-group mb-3">
    {{ html()->label('Status', 'status') }}
    {{ html()->select('status', [
            '1' => 'Active',
            '2' => 'Inactive'
        ])->
        class('form-control form-control-sm'. ($errors->has('status') ? 'is-invalid' : ''))}}
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
