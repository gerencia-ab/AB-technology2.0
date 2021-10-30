$(document).ready(function(){
    /* Swiper para la visualización del portafolio */
    var swiperPortafolio = new Swiper(document.getElementsByClassName('swiper')[0], {
        grabCursor: true,
        effect: "creative",
        creativeEffect: {
          prev: {
            shadow: true,
            origin: "left center",
            translate: ["-5%", 0, -200],
            rotate: [0, 100, 0],
          },
          next: {
            origin: "right center",
            translate: ["5%", 0, -200],
            rotate: [0, -100, 0],
          },
        },
    });
    /* Swiper para el formulario de contacto */
    const swiperContacto = new Swiper(document.getElementsByClassName('swiper')[1], {
        direction: 'horizontal',
        loop: false,
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });
})
