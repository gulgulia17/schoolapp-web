@extends('main')
@section('title','Purchase')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate mb-0 text-center">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2">
                        <a href="index">Home<i class="fa fa-chevron-right"></i></a>
                    </span>
                    <span>Purchase  <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">Product Subscription</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper px-md-4">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Subscription of School App</h3>
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="{{route('payment')}}" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">School Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}" autofocus>
                                                @error('name')
                                                    <span class="text-danger error">*{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                                                @error('email')
                                                    <span class="text-danger error">*{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="phone">Phone Number</label>
                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your contact detail" value="{{old('phone')}}">
                                                @error('phone')
                                                    <span class="text-danger error">*{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="subscription">Subscription</label>
                                                <select name="subscription" class="form-control" id="Subscription">
                                                    <option value="">Please Choose Plan</option>
                                                    <option value="PlanA">1 Year @ 7000</option>
                                                    <option value="PlanB">2 Year @ 14000</option>
                                                </select>
                                                @error('subscription')
                                                    <span class="text-danger error">*{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-12 text-right mt-3 mb-0">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Process</button>
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection