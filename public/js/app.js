import './bootstrap';

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