document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const main = document.querySelector('.main');
    const toggleIcon = document.getElementById('sidebar-toggle-icon');

    toggleIcon.addEventListener('click', function (e) {
        e.stopPropagation();
        sidebar.classList.toggle('active');
    });

    main.addEventListener('click', function () {
        if (window.innerWidth < 576 && sidebar.classList.contains('active')) {
            sidebar.classList.remove('active');
        }
    });
});