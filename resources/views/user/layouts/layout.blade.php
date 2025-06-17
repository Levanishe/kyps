<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Туры</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('front/css/user.css')}}">

    {{-- Проверяем, активен ли Хэллоуин (с учетом тумблера и дат) --}}
    @if(isset($isHalloweenActive) && $isHalloweenActive)
        <link href="{{ asset('front/events/halloween/halloween.css') }}" rel="stylesheet">
    @endif

    {{-- Проверяем, активен ли снег (с учетом тумблера и дат) --}}
    @if(isset($isSnowActive) && $isSnowActive)
        <link rel="stylesheet" href="{{asset('front/events/snowFlakes/snow.css')}}">
    @endif
</head>

<body>
    <div class="navbarr">
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

    {{-- Передаем состояние событий в глобальные JS-переменные --}}
    {{-- Теперь передаем флаги активности, а не состояние тумблера напрямую --}}
    <script>
        window.event_halloween_enabled = {{ isset($isHalloweenActive) && $isHalloweenActive ? 'true' : 'false' }};
        window.event_snow_enabled = {{ isset($isSnowActive) && $isSnowActive ? 'true' : 'false' }};
    </script>

    {{-- Подключаем JS для Хэллоуина, только если он активен --}}
    @if(isset($isHalloweenActive) && $isHalloweenActive)
        <script src="{{ asset('front/events/halloween/halloween.js') }}"></script>
    @endif

    {{-- Подключаем JS для снега, только если он активен --}}
    @if(isset($isSnowActive) && $isSnowActive)
        <script src="{{asset('front/events/snowFlakes/snow.js')}}"></script>
        <script>
            // Проверяем, существует ли Snow и включен ли снег
            if (typeof Snow !== 'undefined' && window.event_snow_enabled) {
                new Snow();
            } else if (typeof Snow === 'undefined') {
                console.warn("Snow class not found. Make sure snow.js is loaded correctly.");
            }
        </script>
    @endif
</body>

</html>