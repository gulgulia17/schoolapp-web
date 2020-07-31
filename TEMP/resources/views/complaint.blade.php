@extends('main')
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
                    <span>Raise Complaint<i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">Complaint</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper px-md-4">
                    @if (session('ticket'))
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="contact-wrap w-100 px-md-5 px-4 py-md-3 py-2">
                                <p class="text-danger mb-0">
                                    <span>Your ticket number is - <span class="font-weight-bold">{{session('ticket')}}</span>.</span>
                                    <span>Please use this number for further inquiry in future.</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Complaint</h3>
                                
                                <form method="POST" id="contactForm" action="{{route('complaint')}}" name="contactForm" class="contactForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Full Name</label>
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
                                                <label class="label" for="subject">Complaint Title</label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Tell me About Complaint" value="{{old('subject')}}">
                                                @error('subject')
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Complaint Message</label>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4"
                                                placeholder="Tell me About your Complaint full Detail for Schoolapp">{{old('message')}}</textarea>
                                                @error('message')
                                                    <span class="text-danger error">*{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="label" for="district">Choose SCREENSHOT</label>
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="logo">
                                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Send Message" class="btn btn-primary">
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
@section('script')
    <script>
        $(".custom-file-input").on("change", function(e) {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            var url = URL.createObjectURL(e.target.files[0]);
            $('#preview').attr('src', url); 
        });
    </script>
@endsection