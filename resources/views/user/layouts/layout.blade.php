<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Туры</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="navbarr">
        @include('user.layouts.navbar') <!-- Подключаем navbar -->
    </div>

    <div class="container">
        @yield('content') <!-- Основной контент страницы -->
    </div>

    <div class="footer">
        @include('user.layouts.footer') <!-- Подключаем footer -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
  const toggleButton = document.getElementById('theme-toggle');

  // Проверяем, есть ли сохраненная тема в localStorage
  const currentTheme = localStorage.getItem('theme') || 'light';
  if (currentTheme === 'dark') {
      document.body.classList.remove('bg-light', 'text-dark');
      document.body.classList.add('bg-dark', 'text-light'); // Применяем темную тему
  }

  toggleButton.addEventListener('click', () => {
      if (document.body.classList.contains('bg-dark')) {
          document.body.classList.remove('bg-dark', 'text-light');
          document.body.classList.add('bg-light', 'text-dark');
          localStorage.setItem('theme', 'light'); // Сохраняем тему
      } else {
          document.body.classList.remove('bg-light', 'text-dark');
          document.body.classList.add('bg-dark', 'text-light');
          localStorage.setItem('theme', 'dark'); // Сохраняем тему
      }
  });
});
    </script>

</body>

</html>