@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Testimonial Create</h1>
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
                    <h5 class="card-title">Add Testimonial</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('testimonial.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Client Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{old('name')}}" placeholder="Enter clients name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="logo">Client Logo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="logo" name="logo" aria-describedby="imageHelp">
                                <label class="custom-file-label" for="logo">Choose file</label>
                                <small id="imageHelp" class="text-muted">Image file must not be lower than 20KB</small>
                            </div>
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="work">Client Work</label>
                            <input type="text" name="work" id="work" class="form-control @error('work') is-invalid @enderror"
                                value="{{old('work')}}" placeholder="Enter clients work">
                                @error('work')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="testimonial">Client Testimonial</label>
                            <textarea name="testimonial" id="testimonial"
                                class="form-control @error('testimonial') is-invalid @enderror"
                                placeholder="Enter clients testimonial" rows="5">{{old('testimonial')}}</textarea>
                            @error('testimonial')
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

@section('js')@stop