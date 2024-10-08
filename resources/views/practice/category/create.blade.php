@extends('layouts.app')
@section('title')
  edit menu
@endsection
@section('content')

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

                    {{-- <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf --}}

                        {{-- Product Name --}}
                        {{-- <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
                        </div> --}}


                        {{-- Submit Button --}}
                        {{-- <button type="submit" class="btn btn-primary">Create Category</button>
                    </form> --}}
                    {{html()->form('post',route('categories.store'))->id('create_form')->open()}}
                    <div class="row justify-content-center align-items-end">
                        @include('practice.category.partials.form')
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Create Category</button>
                        </div>
                    </div>
                    {{html()->form()->close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
