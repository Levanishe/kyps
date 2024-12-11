<link href="https://cdn.jsdelivr.net/gh/Alaev-Co/snowflakes/dist/snow.min.css" rel="stylesheet">
<nav class="navbar navbar-expand-lg" >
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.tours.index') }}"> 
            <img src="{{asset('/images/other/logo.png')}}" style="width:10vh;" alt="">
        </a>
        @if(Auth::check() && Auth::user()->is_admin)
        <a class="navbar-brand" href="{{ route('admin.tours.index') }}">Админка-Туры</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white;"> <!-- Кнопка белая -->
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('user.tours.index') }}">Список Туров</a> <!-- Цвет текста белый -->
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('user.categories.index') }}">Список Категорий</a> <!-- Цвет текста белый -->
                </li>
            </ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                @if(Auth::user()->hasVerifiedEmail())
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('user.users.edit') }}"> <!-- Цвет текста белый -->
                        {{ Auth::user()->name }}
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('verification.notice') }}">Верифицироваться</a> <!-- Цвет текста белый -->
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <!-- Цвет текста белый -->
                        Выход
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">Вход</a> <!-- Цвет текста белый -->
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('register') }}">Регистрация</a> <!-- Цвет текста белый -->
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/gh/Alaev-Co/snowflakes/dist/Snow.min.js"></script>