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
                    {{html()->modelForm($product,'put',route('products.update',$product->id))->id('create_form')->open()}}
                    <div class="row justify-content-center align-items-end">
                        @include('practice.product.partials.form')
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Update product</button>
                        </div>
                    </div>
                    {{html()->form()->close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
