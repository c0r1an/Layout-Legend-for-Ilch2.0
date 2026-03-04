(function () {
    var toggle = document.querySelector('[data-legend-nav-toggle]');
    var nav = document.querySelector('[data-legend-nav]');

    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            nav.classList.toggle('is-open');
        });
    }
})();
