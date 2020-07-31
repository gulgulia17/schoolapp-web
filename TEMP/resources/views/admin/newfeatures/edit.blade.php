@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Newfeatures Edit</h1>
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
                    <h5 class="card-title">Edit Newfeatures</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('newfeatures.update',$newfeature->id)}}" method="post" enctype="multipart/form-data">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="name">Feature Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{old('name') ?? $newfeature->name}}" placeholder="Enter feature name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Feature Description</label>
                            <input type="text" name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror"
                                value="{{old('desc') ?? $newfeature->desc}}" placeholder="Enter feature description">
                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">    
                                <div class="d-block"><label for="Newfeatures">Current Image</label></div>
                                <img src="{{asset($newfeature->image)}}" style="height: 200px;width: 50%!important;">
                                
                            </div>
                            <div class="col-md-6">
                                <label for="Newfeatures">Feature Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg w-100">Submit</button>
                        </div>
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