@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>About</h1>
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
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label for="shortdescription">Short Description</label>
                            <textarea class="form-control @error('shortdescription') is-invalid @enderror" name="shortdescription" id="shortdescription"
                                placeholder="Short Description" rows="3">{{old('about')??isset($about->shortdescription) ? $about->shortdescription:null}}</textarea>
                                @error('shortdescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <blockquote class="blockquote my-5">
                            <div class="form-group">
                                <label for="slogan">Slogan</label>
                                <textarea class="form-control @error('slogan') is-invalid @enderror" name="slogan" id="slogan"
                                    placeholder="Slogan" rows="3">{{old('about')??isset($about->slogan) ? $about->slogan:null}}</textarea>
                                @error('slogan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                        </blockquote>
                        <div class="form-group">
                            <label for="longdescription">Long Description</label>
                            <textarea class="form-control @error('longdescription') is-invalid @enderror" name="longdescription" id="longdescription"
                                placeholder="Long Description" rows="3">{{old('about')??isset($about->longdescription) ? $about->longdescription:null}}</textarea>
                                @error('longdescription')
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

@stop

@section('js')

@stop