@extends('layouts.app')
@section('title')
  edit menu
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Category</div>

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
                    {{-- <form method="POST" action="{{ route('categories.update', $category->id) }}">
                        @csrf
                        @method('PUT') --}}



                        {{-- Submit Button --}}
                        {{-- <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </form> --}}
                    {{html()->modelForm($category,'put',route('categories.update',$category->id))->id('create_form')->open()}}
                    <div class="row justify-content-center align-items-end">
                        @include('practice.category.partials.form')
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </div>
                    {{html()->form()->close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
