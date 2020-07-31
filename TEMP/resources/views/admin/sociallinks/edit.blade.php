@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Social Links Edit</h1>
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
                    <h5 class="card-title">Edit Social Links</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('sociallinks.update',$sociallink->id)}}" method="post">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="icon">Icon Code</label>
                            <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror"
                                value="{{old('icon') ?? $sociallink->icon}}" placeholder="eg: fa fa-facebook" aria-describedby="iconHelp">
                                <small id="iconHelp" class="text-muted">Please only use <a href="https://fontawesome.com/"><i class="fab fa-font-awesome" aria-hidden="true"></i></a> ICONS</small>
                            @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Icon Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{old('name') ?? $sociallink->name}}" placeholder="eg: Facebook">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror"
                                value="{{old('url') ?? $sociallink->url}}" placeholder="eg: https://www.facebook.com">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-lg w-100">Submit</button>
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

@section('js')@stop