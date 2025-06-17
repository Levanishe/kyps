<!-- Админ -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <a class="navbar-brand" href="{{ route('user.tours.index') }}">Туры</a>
    @if(Auth::check())
    @if(Auth::user()->is_admin)
    <a class="navbar-brand" href="{{ route('admin.tours.index') }}">Админка-Туры</a>
    @endif
    @endif
    <div class="unique-theme-toggle">
        <span class="theme-icon moon-icon">🌙</span>
        <input type="checkbox" id="theme-toggle" class="unique-theme-switch" />
        <label for="theme-toggle" class="unique-toggle-label">
            <span class="unique-toggle-ball"></span>
        </label>
        <span class="theme-icon sun-icon">☀️</span>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.tours.index') ? 'active' : '' }}" href="{{ route('admin.tours.index') }}">Список Туров</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">Список Категорий</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Список Пользователей</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.events.index') ? 'active' : '' }}" href="{{ route('admin.events.index') }}">Управление событиями</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @if(Auth::check())
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