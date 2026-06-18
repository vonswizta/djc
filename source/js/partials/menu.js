if (document.querySelector('.mobile-menu')) {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuToggleText = document.querySelector('.menu-toggle-text');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileNav = document.querySelector('.mobile-nav');

    function closeMenu() {
        mobileMenu.classList.add('hidden');
        menuToggleText.textContent = 'Menu';
        menuToggle.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
    }

    menuToggle.addEventListener('click', (e) => {
        e.stopPropagation();

        mobileMenu.classList.toggle('hidden');

        const isOpen = !mobileMenu.classList.contains('hidden');

        menuToggleText.textContent = isOpen ? 'Close' : 'Menu';
        menuToggle.setAttribute('aria-expanded', isOpen);
        mobileMenu.setAttribute('aria-hidden', !isOpen);
    });

    document.addEventListener('click', (e) => {
        if (!mobileNav.contains(e.target)) {
            closeMenu();
        }
    });
}