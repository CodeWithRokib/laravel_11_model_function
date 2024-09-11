@extends('layouts.app')
@section('title')
  edit menu
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New SubCategory</div>

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

                    {{html()->form('post',route('subcategories.store'))->id('create_form')->open()}}
                    <div class="row justify-content-center align-items-end">
                        @include('practice.subcategory.partials.form')
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Create SubCategory</button>
                        </div>
                    </div>
                    {{html()->form()->close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
