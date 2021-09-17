<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once __DIR__.'/php/scripts/scriptsCSS.php';
    ?>
    <style>
        .swiper-button-next{
            color: #FFF;
            margin-right: -12px;
        }
        .swiper-button-prev{
            color: #FFF;
            margin-left: -12px;
        }
        .swiper-pagination{
            text-align: left;
            margin-left: 30px;
        }
    </style>
</head>
   
<body>
<header class="bg-primary text-center">
    <?php
        include_once __DIR__.'/php/header.php';
    ?>
    <h1>Encabezado</h1>
</header>
<div class="p-5">

    <?php
        include_once __DIR__.'/php/contacto.php';
    ?>

</div>




<footer class="bg-secondary text-center">
    <h1>Pie de página</h1>

</footer>
    
    <?php
        include __DIR__.'/php/scripts/scriptsJS.php'
    ?>
    <script>
        const swiper = new Swiper('.swiper', {
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
    </script>
</body>
</html>