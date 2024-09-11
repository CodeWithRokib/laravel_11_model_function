@extends('layouts.app')
@section('title')
  menu create
@endsection
@section('content')

<div class="container">
    <h1 class="my-4">Create Menu</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card body-card pt-5">
        <div class="card-body">
            {{ html()->form('POST', route('menus.store'))->id('create_form')->open() }}
            <div class="row justify-content-center align-items-end mb-4">
                <div class="col-md-4">
                    @include('practice.menu.partials.form')
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Create Menu</button>
                </div>
            </div>

            {{ html()->form()->close() }}
        </div>
    </div>

</div>

@endsection
