<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админка</title>
</head>

<body>
  <header>
    <h1>Админка</h1>
    <nav>
      <a href="{{ route('tours.index') }}">Туры</a>
      <a href="{{ route('tours.create') }}">Туры создать</a>
      <a href="{{ route('tours.show') }}">Туры посмотреть</a>
    </nav>
    <nav>
      <a href="{{ route('tours.index') }}">Туры</a>
      <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Выйти</button>
      </form>
    </nav>

  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>