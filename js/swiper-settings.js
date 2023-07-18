const swiper = new Swiper('.swiper', {
    loop: true,
    autoHeight: false,
    autoplay: {
        delay: 8000,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        type: 'bullets',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 10,
});