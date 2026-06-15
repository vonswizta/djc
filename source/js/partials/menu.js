if (document.querySelector('.mobile-menu') !== null) {
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileNav = document.querySelector('.mobile-nav');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
    });

    document.addEventListener('click', (e) => {
        if (!mobileNav.contains(e.target)) {
            mobileMenu.classList.remove('active');
        }
    });
}
