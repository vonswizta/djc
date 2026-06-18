const cookieBanner = document.querySelector('.cookie-banner');

if (cookieBanner) {
    if (document.cookie.indexOf('cookieok=') < 0) {
        cookieBanner.classList.remove('hidden');
    }

    document.addEventListener('click', function (e) {
        if (e.target.closest('.cookie-accept')) {
            e.preventDefault();

            const expiryDate = new Date();
            expiryDate.setMonth(expiryDate.getMonth() + 1);

            document.cookie =
                'cookieok=1; expires=' +
                expiryDate.toUTCString() +
                '; path=/; SameSite=Lax';

            cookieBanner.classList.add('hidden');
        }
    });
}