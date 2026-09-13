document.addEventListener('DOMContentLoaded', function () {

    const navbar = document.getElementById('mainNavbar');

    function handleScroll() {

        if (!navbar) return;

        if (window.scrollY > 30) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }

    window.addEventListener('scroll', handleScroll);

    handleScroll();

});