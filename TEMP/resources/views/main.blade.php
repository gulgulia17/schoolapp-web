<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title','Home |') School App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <meta property="og:site_name" content="School APP">
    <meta property="og:title" content="School Managment app by IT Plus." />
    <meta property="og:description" content="With the school app, you can easily manage your student's record, and parents can check their children's performance, attendance, and another things." />
    <meta property="og:image" itemprop="image" content="{{asset('images/favicon/apple-touch-icon.png')}}">
    <meta property="og:type" content="website" />
    <meta name="msapplication-TileImage" content="{{asset('images/favicon/apple-touch-icon.png')}}">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="{{asset('images/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('images/favicon/android-chrome-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{asset('images/favicon/android-chrome-512x512.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
    <link rel="shortcut icon" href="{{asset('images/favicon/favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        /* success */
        .ftco-footer {
            padding: 0;
            text-align: center;
        }

        .error {
            font-size: .65rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
    </style>
</head>

<body>
    @include('includes.navigation')
    @yield('content')
    @include('includes.footer')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('js/scrollax.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"></script>
    @if (session('success'))
    <script>
        $(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: 'success',
                title: "{{ session('success') }}"
            })
        });
    </script>
    @elseif (session('error'))
    <script>
        $(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: 'error',
                title: "{{ session('error') }}"
            })
        });
    </script>
    @endif
    @yield('script')
</body>

</html>