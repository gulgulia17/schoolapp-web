@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Welcome Greetings</h1>
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
                        <div class="text-center">
                            <span class="subheading">Welcome To School App</span>
                            <h2 class="mb-4">School App Created By IT Plus</h2>
                        </div>
                        <div class="form-group">
                            <label for="shortdescription">Short Description</label>
                            <textarea class="form-control @error('shortdescription') is-invalid @enderror" name="shortdescription" id="shortdescription"
                                placeholder="Short Description" rows="3">{{old('about')??isset($gretting->shortdescription) ? $gretting->shortdescription:null}}</textarea>
                            @error('shortdescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="longdescription">Long Description</label>
                            <textarea class="form-control @error('longdescription') is-invalid @enderror" name="longdescription" id="longdescription"
                                placeholder="Long Description" rows="3">{{old('about')??isset($gretting->longdescription) ? $gretting->longdescription:null}}</textarea>
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