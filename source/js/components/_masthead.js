if (document.querySelector('.masthead') !== null) {
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var header = $('.masthead');
    var navbarHeight = header.outerHeight();

    $(window).scroll(function (event) {
        didScroll = true;
    });

    hasScrolled();

    setInterval(function () {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 200);

    function hasScrolled() {
        var st = $(this).scrollTop();

        if (st == 0) {
            header.removeClass('active');
        } else {
            header.addClass('active');
        }

        if (Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st > lastScrollTop && st > navbarHeight) {
            header.removeClass('down').addClass('up');
        } else {
            if (st + $(window).height() < $(document).height()) {
                header.removeClass('up').addClass('down');
            }
        }

        lastScrollTop = st;
    }
}

if (document.querySelector('.menu-sidebar-item') !== null) {
    var sidebarMenu = $("<ul class='sidebar-menu'></ul>").appendTo(".sub-content");
    $('.menu-header .menu-sidebar-item').each(function () {
        var clonedItem = $(this).clone();
        $(this).addClass('d-none').closest('.sub-inner').find(sidebarMenu).addClass('cloned').append(clonedItem);
    });
}
