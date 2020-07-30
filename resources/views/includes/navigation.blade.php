@php $sociallinks = App\Admin\SocialLinks::all(); @endphp
    <div class="container-fluid px-md-5  pt-4 pt-md-5">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a class="navbar-brand" href="index">School <span>App</span>
                            <small>To have a record.</small></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-md-flex d-none">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        @foreach ($sociallinks as $item)
                            <a href="{{$item->url}}" class="d-flex align-items-center justify-content-center"><span class="{{$item->icon}}"><i class="sr-only">{{$item->name}}</i></span></a>    
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item {{ Request::is('index') ? 'active' : '' }}"><a href="index" class="nav-link">Home</a></li>
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}"><a href="about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="https://itplus.co.in/" target="_blank" class="nav-link">Developer</a></li>
                    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}"><a href="contact" class="nav-link">Contact</a></li>
                    <li class="nav-item {{ Route::is('purchase') ? 'active' : '' }}"><a href="{{route('purchase')}}" class="nav-link">Purchase Request</a></li>
                    <li class="nav-item {{ Route::is('purchasesubscription') ? 'active' : '' }}"><a href="{{route('purchasesubscription')}}" class="nav-link">Purchase</a></li>
                    <li class="nav-item {{ Route::is('complaint') ? 'active' : '' }}"><a href="{{route('complaint')}}" class="nav-link">Complaint</a></li>
                </ul>
            </div>
        </div>
    </nav>