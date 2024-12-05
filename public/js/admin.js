document.addEventListener('DOMContentLoaded', function () {
  const themeToggleButton = document.getElementById('theme-toggle');
  const navbar = document.getElementById('navbar');
  const content = document.getElementById('content');

  // Проверка сохраненной темы в localStorage
  const currentTheme = localStorage.getItem('theme');
  if (currentTheme) {
    document.body.classList.add(currentTheme);
    if (currentTheme === 'dark-theme') {
      navbar.classList.remove('navbar-dark', 'bg-dark');
      navbar.classList.add('navbar-light', 'bg-light');
    }
  }

  themeToggleButton.addEventListener('click', function () {
    // Переключение темы
    if (document.body.classList.contains('dark-theme')) {
      document.body.classList.remove('dark-theme');
      navbar.classList.remove('navbar-light', 'bg-light');
      navbar.classList.add('navbar-dark', 'bg-dark');
      localStorage.setItem('theme', 'light-theme');
    } else {
      document.body.classList.add('dark-theme');
      navbar.classList.remove('navbar-dark', 'bg-dark');
      navbar.classList.add('navbar-light', 'bg-light');
      localStorage.setItem('theme', 'dark-theme');
    }
  });
});