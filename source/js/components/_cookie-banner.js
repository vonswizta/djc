if (document.querySelector('.cookie-banner') !== null) {
    if (document.cookie.indexOf("cookieok=") < 0) {
        $('.cookie-banner').addClass('active');
    }
    $(document).on('click', '.cookie-accept', function (e) {
        e.preventDefault();
        var expiryDate = new Date();
        expiryDate.setMonth(expiryDate.getMonth() + 1);
        document.cookie = 'cookieok=1; expires=' + expiryDate.toGMTString() + ';';
        $('.cookie-banner').removeClass('active');
    });
}
