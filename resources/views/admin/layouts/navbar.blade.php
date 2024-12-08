<!-- Админ -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <a class="navbar-brand" href="{{ route('user.tours.index') }}">Туры</a>
    @if(Auth::check())
    @if(Auth::user()->is_admin)
    <a class="navbar-brand" href="{{ route('admin.tours.index') }}">Админка-Туры</a>
    @endif
    @endif
    <button id="theme-toggle" class="btn btn-primary">Сменить тему</button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.tours.index') ? 'active' : '' }}" href="{{ route('admin.tours.index') }}">Список Туров</a>
                <a class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">Список Категорий</a>
            </li>

            @if(Auth::check())
            <!-- Если пользователь авторизован -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выход
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @else
            <!-- Если пользователь не авторизован -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Вход</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
            </li>
            @endif
        </ul>
    </div>
</nav>