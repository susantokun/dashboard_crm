import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

// slider header
new Swiper(".swiper.slider", {
    // cssMode: true,
    modules: [Navigation, Pagination, Autoplay],
    navigation: {
        nextEl: ".swiper-button-next.slider",
        prevEl: ".swiper-button-prev.slider",
    },
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    pagination: {
        el: ".swiper-pagination.slider",
        clickable: true,
    },
    mousewheel: false,
    keyboard: true,
});

// slider partner
new Swiper(".swiper.partner", {
    // cssMode: true,
    modules: [Navigation, Pagination, Autoplay],
    slidesPerView: 1,
    spaceBetween: 30,
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        720: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1280: {
            slidesPerView: 4,
            spaceBetween: 30,
        }
    },
    loop: false,
    autoplay: {
        delay: 2000,
    },
    mousewheel: false,
    keyboard: false,
});

// slider client
new Swiper(".swiper.client", {
    // cssMode: true,
    modules: [Navigation, Pagination, Autoplay],
    slidesPerView: 1,
    spaceBetween: 30,
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        720: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1280: {
            slidesPerView: 4,
            spaceBetween: 30,
        }
    },
    loop: true,
    autoplay: {
        delay: 2000,
    },
});

// slider video
new Swiper(".swiper.video", {
    // cssMode: true,
    modules: [Navigation, Pagination, Autoplay],
    slidesPerView: 1,
    spaceBetween: 30,
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        720: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1280: {
            slidesPerView: 4,
            spaceBetween: 30,
        }
    },
    loop: false,
    autoplay: {
        delay: 4000,
    },
    mousewheel: false,
    keyboard: false,
    pagination: {
        el: ".swiper-pagination.video",
        clickable: true,
    },
});

// slider team
new Swiper(".swiper.team", {
    // cssMode: true,
    modules: [Navigation, Pagination, Autoplay],
    slidesPerView: 1,
    spaceBetween: 20,
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        720: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1280: {
            slidesPerView: 5,
            spaceBetween: 20,
        }
    },
    loop: false,
    autoplay: {
        delay: 2000,
    },
    mousewheel: false,
    keyboard: false,
});
