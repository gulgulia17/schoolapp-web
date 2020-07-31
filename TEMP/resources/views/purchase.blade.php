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
                    <span>Purchase <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">Purchase</h1>
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
                                <h3 class="mb-4">Purchase Request</h3>
                                <form method="POST" id="contactForm" name="contactForm" class="contactForm" enctype="multipart/form-data">
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
                                                <label class="label" for="phone">Phone Number</label>
                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your contact detail" value="{{old('phone')}}">
                                                @error('phone')
                                                    <span class="text-danger error">*{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="school">School Name</label>
                                                <input type="text" class="form-control" name="school" id="school" placeholder="School Name" value="{{old('school')}}">
                                                @error('school')
                                                    <span class="text-danger error">*{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="state">Choose State</label>
                                                <select class="custom-select" name="state_id" id="state">
                                                    <option selected>Select one</option>
                                                    @foreach ($state as $item)
                                                    <option value="{{$item->id}}">{{$item->state}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="label" for="district">Choose disctrict</label>
                                                <select class="custom-select" name="district_id" id="district">
                                                    <option selected>Select one</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{--<div class="col-md-6">
                                          <div class="form-group">
                                            <label class="label" for="district">Choosen Image</label>
                                            <div class="form-group">
                                                <img src="" class="img-fluid" id="preview" style="height: 100px;">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="label" for="district">Choose Image</label>
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="logo">
                                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                              </div>
                                            </div>
                                        </div>--}}
                                        <div class="col-md-12 text-right mt-3 mb-0">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
        $('#state').change(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/disctrict",
                data: {
                    _token:$('input[name="_token"]').val(),
                    state_id:$(this).val(),
                },
                success: function (response) {
                    console.log(response);
                    $('#district').children().not(':first').remove();
                    response.forEach(element => {
                        $('#district').append(`<option value="${element.id}">${element.district}</option>`)
                    });    
                }
            });
        });
    </script>
@endsection