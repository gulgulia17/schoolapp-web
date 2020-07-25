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
                    <h5 class="card-title">Edit Counter</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('counter.update',$counter->id)}}" method="post">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="active">Counter Active Installation</label>
                            <input type="text" name="active" id="active" class="form-control @error('active') is-invalid @enderror"
                                value="{{old('active') ?? $counter->active}}" placeholder="Enter value for active install counter">
                                @error('active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="updates">Counter Updates</label>
                            <input type="text" name="updates" id="updates" class="form-control @error('updates') is-invalid @enderror"
                                value="{{old('updates') ?? $counter->updates}}" placeholder="Enter value for updates counter">
                                @error('updates')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="mettings">Counter Mettings</label>
                            <input type="text" name="mettings" id="mettings" class="form-control @error('mettings') is-invalid @enderror"
                                value="{{old('mettings') ?? $counter->mettings}}" placeholder="Enter value for mettings counter">
                                @error('mettings')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="facebookfans">Counter Facebook Fans</label>
                            <input type="text" name="facebookfans" id="facebookfans" class="form-control @error('facebookfans') is-invalid @enderror"
                                value="{{old('facebookfans') ?? $counter->facebookfans}}" placeholder="Enter value for facebookfans counter">
                                @error('facebookfans')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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