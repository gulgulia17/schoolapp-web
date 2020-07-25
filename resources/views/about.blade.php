@extends('main')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: linear-gradient(0deg, rgba(255, 255, 255, 0.6), rgba(0, 0, 0, 0.9)), url({{asset('images/bg_5.jpg')}});">
    <div class="overlay">

    </div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate mb-0 text-center">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2">
                        <a href="index">Home<i class="fa fa-chevron-right"></i></a>
                    </span>
                    <span>About us <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">About Us</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="heading-section text-center ftco-animate pb-4">
                    <span class="subheading">Welcome To School App</span>
                    <h2>School App Created By IT Plus</h2>
                </div>
                <p>{{isset($about->shortdescription) ? $about->shortdescription : null}}</p>
                <blockquote class="blockquote my-5">
                    <span class="fa fa-quote-left"></span>
                    <h3>{{isset($about->slogan) ? $about->slogan : null}}</h3>
                </blockquote>
                <p>{{isset($about->longdescription) ? $about->longdescription : null}}</p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center" style="background-image: url({{asset($herosection->image)}});">
            </div>
            <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
                <div class="heading-section">
                    <span class="subheading">Welcome To School App</span>
                    <h2 class="mb-4">School App Created By IT Plus</h2>
                    <p>@isset($gretting) {{$gretting->shortdescription}} @endisset</p>
                    <p>@isset($gretting) {{$gretting->longdescription}} @endisset</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection