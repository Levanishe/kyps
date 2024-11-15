<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('tours.index') }}">Туры</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto"> <!-- Добавлено ml-auto для выравнивания вправо -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tours.index') }}">Список Туров</a>
            </li>

            @if(Auth::check())
                <!-- Если пользователь авторизован -->
                @if(Auth::user()->is_admin) <!-- Проверяем, является ли пользователь администратором -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.tours.create') }}">Создать тур</a>
                    </li>
                @endif
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
