if (document.querySelector('.swiper:not(.swiper-gallery)') !== null) {
    document.querySelectorAll(".swiper:not(.swiper-gallery)").forEach(function (item) {
        let next = item.querySelector(".swiper-button-next");
        let prev = item.querySelector(".swiper-button-prev");
        let pagination = item.querySelector(".swiper-pagination");
        let slides = item.getAttribute('data-items');
        var swiper = new Swiper(item, {
            slidesPerView: 1.2,
            spaceBetween: 20,
            navigation: {
                nextEl: next,
                prevEl: prev
            },
            pagination: {
                el: pagination,
                clickable: true
            },
            breakpoints: {
                992: {
                    slidesPerView: slides
                },
            }
        });
    });
}

if (document.querySelector('.swiper-gallery') !== null) {
    var galleryThumbs = new Swiper(".gallery-thumbs", {
        loop: true,
        spaceBetween: 15,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            992: {
                slidesPerView: 6
            }
        }
    });
    var galleryMain = new Swiper(".gallery-main", {
        loop: true,
        spaceBetween: 0,
        thumbs: {
            swiper: galleryThumbs,
        },
    });
}
