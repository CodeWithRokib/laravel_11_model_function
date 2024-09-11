@extends('layouts.app')
@section('title')
  edit menu
@endsection
@section('content')

<div class="container">
    <h1 class="my-4">Edit Menu</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card body-card pt-5">
        <div class="card-body">
            {{html()->modelForm($menu,'put',route('menus.update',$menu->id))->id('create_form')->open()}}
            <div class="row justify-content-center align-items-end">
                @include('practice.menu.partials.form')
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Update Menu</button>
                </div>
            </div>
            {{html()->form()->close()}}
        </div>
    </div>
</div>



@endsection
