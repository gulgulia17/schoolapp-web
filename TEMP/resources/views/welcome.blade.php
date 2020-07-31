@extends('main')
@section('content')
<section class="hero-wrap" style="background-image: linear-gradient(0deg, rgba(255, 255, 255, 0.6), rgba(0, 0, 0, 0.9)), url({{asset($herosection->image)}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center">
            <div class="col-md-8 ftco-animate d-flex align-items-end">
                <div class="text w-100">
                    <h1 class="mb-4">{{$herosection->title}}</h1>
                    <p class="mb-4">{!!$herosection->description!!}</p>
                    {{-- <p>
                        <a href="#" class="btn btn-primary py-3 px-4">Explore Now</a>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt mt-5 mt-md-0">
    <div class="container">
        <div class="row">
            @foreach ($topfeature as $item)
            <div class="col-md-3 d-flex align-items-stretch ftco-animate">
                <div class="services-2 text-center">
                    <div class="icon-wrap">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="{{asset($item->image)}}" class="img-fluid rounded-circle">
                        </div>
                    </div>
                    <h2 class="mt-3"><a href="#">{{$item->title}}</a></h2>
                    <p>{{$item->description}}</p>
                </div>
            </div>    
            @endforeach
        </div>
    </div>
</section>
<section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18 py-4 mb-4">
                    <div class="text align-items-center">
                        <strong class="number" data-number="{{$counter->active}}">0</strong>
                        <span>Active Subscriptions</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18 py-4 mb-4">
                    <div class="text align-items-center">
                        <strong class="number" data-number="{{$counter->updates}}">0</strong>
                        <span>Total Updates</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18 py-4 mb-4">
                    <div class="text align-items-center">
                        <strong class="number" data-number="{{$counter->mettings}}">0</strong>
                        <span>Cup Of Coffee</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18 py-4 mb-4">
                    <div class="text align-items-center">
                        <strong class="number" data-number="{{$counter->facebookfans}}">0</strong>
                        <span>Facebook Fans</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
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
<section class="ftco-section testimony-section ftco-no-pb mb-5">
    <div class="img img-bg border" style="background-image: url(images/bg_4.jpg);"></div>
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-3">Kinds Words From Clients</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    @foreach ($testimonial as $item)
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                            <div class="text">
                                <p class="mb-4">{{$item->testimonial}}</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url({{asset($item->logo)}})"></div>
                                    <div class="pl-3">
                                        <p class="name">{{$item->name}}</p>
                                        <span class="position">{{$item->work}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt">
    <div class="container-fluid px-md-4">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Updates</span>
                <h2>New Features</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($newfeatures as $item)
            <div class="col-md-6 col-lg-4 d-flex">
                <div class="book-wrap d-lg-flex">
                    <div class="img d-flex justify-content-end" style="background-image: url({{$item->image}});">
                    </div>
                    <div class="text p-4">
                        <h2><a href="#">{{$item->name}}</a></h2>
                        <span class="position">{{$item->desc}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection