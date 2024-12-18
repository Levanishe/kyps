<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Туры</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('front/css/user.css')}}">
    <link rel="stylesheet" href="{{asset('front/snowFlakes/snow.css')}}">
</head>

<body>
    <div class="navbarr" >
        @include('user.layouts.navbar')
    </div>

    <div class="content mb-5">
        @yield('content')
    </div>

    <div class="footer">
        @include('user.layouts.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('front/js/app.js')}}"></script>
    <script src="{{asset('front/snowFlakes/snow.js')}}"></script>
    <script> new Snow(); </script>
</body>

</html>