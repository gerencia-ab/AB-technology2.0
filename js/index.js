$(document).ready(function(){
    console.log(document.getElementsByClassName('swiper')[0])
    console.log(document.getElementsByClassName('swiper')[1])
    const swiperContacto = new Swiper(document.getElementsByClassName('swiper')[0], {
        // Optional parameters
        direction: 'horizontal',
        loop: false,
        
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
        
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        
        // And if we need scrollbar
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
    const swiperPortafolio = new Swiper(document.getElementsByClassName('swiper')[1], {
        // Optional parameters
        direction: 'horizontal',
        loop: false,
        
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
        
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        
        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
        effect: 'cards',
        cardsEffect: {
            // ...
        },
    });  
})
