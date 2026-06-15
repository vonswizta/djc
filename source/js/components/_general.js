if (document.querySelector('.editor table') !== null) {
    $('.editor table').each(function () {
        $(this).wrap('<div class="table-wrapper"></div>');
    });
}