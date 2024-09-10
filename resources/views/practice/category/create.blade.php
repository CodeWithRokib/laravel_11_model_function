
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Category</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Product Name --}}
                        {{-- <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
                        </div> --}}
                        <div class="col-md-6 mb-4">
                            <div class="custom-form-group">
                                {{html()->label('Category Name', 'name')}}
                                {{html()->text('name')->class('form-control form-control-sm'. ($errors->has('name') ? 'is-invalid' : ''))->placeholder(__('Enter category name'))}}

                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

