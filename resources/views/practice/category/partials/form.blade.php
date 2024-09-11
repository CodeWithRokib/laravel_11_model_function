<div class="col-md-6 mb-4">
    <div class="custom-form-group">
        {{html()->label('Category Name', 'name')}}
        {{html()->text('name')->class('form-control form-control-sm'. ($errors->has('name') ? 'is-invalid' : ''))->placeholder(__('Enter category name'))}}

    </div>
</div>
