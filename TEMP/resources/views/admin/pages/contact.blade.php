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
                            <label for="address">Address</label>
                            <input value="{{old('address')??isset($contact->address) ? $contact->address : null}}" type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" placeholder="Your Address" aria-describedby="addresHelp">
                                <small id="addresHelp" class="text-muted">use semicolon (<span class="font-weight-bold"> ; </span>) as seperator.</small>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input value="{{old('phone')??isset($contact->phone) ? $contact->phone : null}}" type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="Your Phone Number">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="{{old('email')??isset($contact->email) ? $contact->email : null}}" type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Your Email Address">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input value="{{old('website')??isset($contact->website) ? $contact->website : null}}" type="text" name="website" id="website"
                                class="form-control @error('website') is-invalid @enderror" placeholder="Developer Website">
                            @error('website')
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