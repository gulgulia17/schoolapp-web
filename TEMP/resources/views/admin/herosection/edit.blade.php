@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Hero Section Edit</h1>
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
                    <h5 class="card-title">Edit Hero Section</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('herosection.update',$herosection->id)}}" method="post" enctype="multipart/form-data">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{old('title') ?? $herosection->title}}" placeholder="A title is always necessary for hero section on websites.">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Background Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" aria-describedby="imageHelp" value="{{$herosection->image}}">
                                <label class="custom-file-label" for="image">{{$herosection->image}}</label>
                                <small id="imageHelp" class="text-muted">Image file must not be lower than 1500x800</small>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="3" name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                            aria-describedby="descriptionHelp">{{old('description') ?? $herosection->description}}</textarea>
                            <small id="descriptionHelp" class="text-muted">Description will make hero section look good.</small>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

@section('js')
<script>
    CKEDITOR.replace( 'description' );
</script>
@stop