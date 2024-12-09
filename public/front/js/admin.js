document.addEventListener('DOMContentLoaded', function () {
    const themeToggleButton = document.getElementById('theme-toggle');
    const navbar = document.getElementById('navbar'); // Убедитесь, что navbar существует
    const content = document.getElementById('content'); // Убедитесь, что content существует

    const currentTheme = localStorage.getItem('theme');
    if (currentTheme) {
        document.body.classList.add(currentTheme);
        themeToggleButton.checked = currentTheme === 'dark-theme';
        updateNavbarTheme(currentTheme);
        updateContentTheme(currentTheme);
    }

    themeToggleButton.addEventListener('change', function () {
        console.log('Тумблер переключен!'); // Добавлено для отладки
        const newTheme = this.checked ? 'dark-theme' : 'light-theme';
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
            // Другие стили для темной темы
        } else {
            content.classList.remove('dark-theme');
            // Другие стили для светлой темы
        }
    }
});

// Загрузчик фото
document.getElementById('image').addEventListener('change', function() {
    const fileName = this.files[0] ? this.files[0].name : 'Файл не выбран';
    document.getElementById('file-name').innerText = fileName;
});
