$(document).ready(function(){
    /* Swiper para la visualización del portafolio */
    var swiperPortafoli1 = new Swiper(document.getElementById('swiperPortafolio'), {
        grabCursor: true,
        loop: true,
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
    var swiperPortafolio2 = new Swiper(document.getElementById('swiperPortafolio2'), {
        grabCursor: true,
        loop: true,
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
    var swiperPortafolio3 = new Swiper(document.getElementById('swiperPortafolio3'), {
        grabCursor: true,
        loop: true,
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
    const swiperContacto = new Swiper(document.getElementById('swiperContacto'), {
        direction: 'horizontal',
        loop: true,
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

    const swiperRequerimientos = new Swiper(document.getElementById('formularioRequerimientos'), {
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      pagination: {
          el: '.swiper-pagination',
          type: 'progressbar',
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
  });
});






var verCredencial = () => {
  let password = document.getElementById("password")
  if(password.type=="password"){
    password.setAttribute("type","text")
  }else{
    password.setAttribute("type","password")
  }
}
