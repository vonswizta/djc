if (document.querySelector('.modal') !== null) {
    $(document).on('show.bs.modal', '.modal', function () {
        $(this).appendTo('body');
    });
}