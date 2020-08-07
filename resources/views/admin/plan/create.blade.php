@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Create New Plans</h1>
        </div>
        <div class="col-md-6">
            @include('includes.alert')
        </div>
       </div>
   </div>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Plan</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('plans.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{old('name')}}" placeholder="Enter name ex. 1 year @ 1000">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea type="text" name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror"
                                value="{{old('desc')}}" placeholder="Enter description" rows="5"></textarea>
                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="Features">Features</label>
                            <textarea type="text" name="features" id="features" class="form-control ckeditor" id="editor @error('features') is-invalid @enderror"
                                value="{{old('features')}}" placeholder="Enter features" rows="5"></textarea>
                                @error('features')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror"
                                value="{{old('amount')}}" placeholder="Enter amount">
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{URL::asset('/ckeditor/ckeditor.js')}}"></script>
@stop