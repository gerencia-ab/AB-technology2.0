<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once __DIR__.'/php/scripts/scriptsCSS.php';
    ?>
</head>
    <body>
        <?php
            include_once __DIR__.'/php/header.php';
        ?>
        
        <!--<div class="slider" id="homeSlider">
            <a href="https://ab-sistemas.com/veterinary/"><img src="./recursos/imagenes/veterinaryBanner.png" alt=""></a>
            <a href="https://ab-sistemas.com/envios/"><img src="./recursos/imagenes/sceBanner.png" alt=""></a>
        </div>-->

        <div class="swiper swiperInicio" id="swiperInicio">
            <div class="swiper-wrapper" style="margin-top: 6vh;">
                <div class="swiper-slide slides">
                    <a href="https://ab-sistemas.com/veterinary/"><img src="./recursos/imagenes/veterinaryBanner.webp" alt="Landing page - Veterinary"></a>
                </div>
                <div class="swiper-slide slides">
                    <a href="https://ab-sistemas.com/envios/"><img src="./recursos/imagenes/sceBanner.webp" alt="Landing page - Sistema control de envíos"></a>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
              
        <?php
            include_once __DIR__.'/php/portafolio.php';
        ?>
        <div class="container mt-3">
            <div style="background-color: #191B2A; width: 100%; height: 15px; border-radius: 10px; margin-top: 50px;">

            </div>
        </div>
        
        <?php
            include_once __DIR__.'/php/servicios.php';
            include_once __DIR__.'/php/contacto.php';
        ?>
        <!-- Código whatsapp -->
        <a  href="https://api.whatsapp.com/send?phone=573158227811&text=Hola,%20quiero%20conocer%20m%C3%A1s%20sobre%20los%20productos%20que%20ofrecen." target="_blank">
            <div id="spanWhatsapp">
                <span id="iconWhatsapp" class="fab fa-whatsapp"> 
                </span>    
            </div>
        </a>
        <?php
            include_once __DIR__.'/php/footer.php';    
            include __DIR__.'/php/scripts/scriptsJS.php'
        ?>    
    </body>
</html>