document.addEventListener('DOMContentLoaded', function () {
  const themeToggleButton = document.getElementById('theme-toggle');
  const navbar = document.getElementById('navbar');
  const content = document.getElementById('content');

  // Проверка сохраненной темы в localStorage
  const currentTheme = localStorage.getItem('theme');
  if (currentTheme) {
      document.body.classList.add(currentTheme);
      updateNavbarTheme(currentTheme);
      updateContentTheme(currentTheme);
  }

  themeToggleButton.addEventListener('click', function () {
      // Переключение темы
      const newTheme = document.body.classList.contains('dark-theme') ? 'light-theme' : 'dark-theme';
      document.body.classList.toggle('dark-theme', newTheme === 'dark-theme');
      document.body.classList.toggle('light-theme', newTheme === 'light-theme');
      updateNavbarTheme(newTheme);
      updateContentTheme(newTheme);
      localStorage.setItem('theme', newTheme);
  });

  function updateNavbarTheme(theme) {
      if (theme === 'dark-theme') {
          navbar.classList.remove('navbar-light', 'bg-light');
          navbar.classList.add('navbar-dark', 'bg-dark');
      } else {
          navbar.classList.remove('navbar-dark', 'bg-dark');
          navbar.classList.add('navbar-light', 'bg-light');
      }
  }

  function updateContentTheme(theme) {
      if (theme === 'dark-theme') {
          content.classList.add('dark-theme');
          // Применяем темную тему ко всем элементам
          document.querySelectorAll('.table').forEach(table => {
              table.classList.add('table-dark');
          });
          document.querySelectorAll('.btn').forEach(btn => {
              btn.classList.add('btn-dark'); // или другой класс для темных кнопок
          });
          // Применяем темную тему к элементам формы
          document.querySelectorAll('.form-control').forEach(input => {
              input.classList.add('bg-secondary', 'text-light');
          });
      } else {
          content.classList.remove('dark-theme');
          document.querySelectorAll('.table').forEach(table => {
              table.classList.remove('table-dark');
          });
          document.querySelectorAll('.btn').forEach(btn => {
              btn.classList.remove('btn-dark'); // убираем темный класс
          });
          // Убираем темную тему с элементов формы
          document.querySelectorAll('.form-control').forEach(input => {
              input.classList.remove('bg-secondary', 'text-light');
          });
      }
  }
});

// Загрузчик фото
document.getElementById('image').addEventListener('change', function() {
  const fileName = this.files[0] ? this.files[0].name : 'Файл не выбран';
  document.getElementById('file-name').innerText = fileName;
});