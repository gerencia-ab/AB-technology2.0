<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once '../../php/scripts/scriptsCSS.php';
    ?>
    <link rel="stylesheet" href="../../css/personalizado/requerimientos.css">
</head>
<body>
        
    <?php
        include_once '../../php/header.php';
    ?>
    <div style="height: 100px;"></div>

    <section class="p-2" id="requerimientos">
    <form>
        <div class="form-container">

            <div class="swiper" id="formularioRequerimientos">
            
                <div class="swiper-wrapper">
                    
                    <div class="swiper-slide">
                        <lottie-player src="../../recursos/animaciones/write3d.json" class="animate__animated animate__bounceIn" background="transparent"  speed="1"  style="width: 250px; height: 250px;"  loop autoplay></lottie-player>
                        <h3 class="title">¡Hola!</h3>
                        <p class="text">Bienvenido al formulario de requerimientos, 
                            te haremos unas preguntas sobre el servicio que necesitas 
                            y nos pondremos en contacto contigo lo más pronto posible 
                            para ofrecerte una asesoría más personalizada.
                        </p>
                        <p class="text">Primero danos tu información de contacto:</p>

                        <!-- Campo de texto nombre -->
                        <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                            <span class="material-icons text-field-icons">
                            badge
                            </span>
                            <div class="mb-3">
                                <input class="form-control text-field" type="text" name="nombre" id="nombre" placeholder="Nombre"/>
                            </div>
                        </div>

                        <!-- Campo de texto email -->
                        <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                            <span class="material-icons text-field-icons">
                            mail
                            </span>
                            <div class="mb-3">
                                <input class="form-control text-field" type="email" name="email" id="email" placeholder="Email"/>
                            </div>
                        </div>

                        <!-- Campo de texto teléfono -->
                        <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                            <span class="material-icons text-field-icons">
                            call
                            </span>
                            <div class="mb-3">
                                <input class="form-control text-field" type="tel" name="celular" id="celular" placeholder="Celular"/>
                            </div>
                        </div>


                    </div>

                    <div class="swiper-slide">
                        <lottie-player src="../../recursos/animaciones/write3d.json" class="animate__animated animate__bounceIn" background="transparent"  speed="1"  style="width: 250px; height: 250px; "  loop autoplay></lottie-player>
                        <h3 class="title">¿Cuál es tu meta?</h3>
                        <p class="text">Selecciona uno o varios</p>

                        <section class="parent">
                            <div class="selectable">
                                <h3 class="subtitle">Página web</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">App</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">Administración</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">Mantenimiento</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">Tienda Online</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">Aplicación a la medida</h3>
                            </div>

                        </section> 
                    </div>

                    <div class="swiper-slide">

                        <lottie-player src="../../recursos/animaciones/write3d.json" class="animate__animated animate__bounceIn" background="transparent"  speed="1"  style="width: 250px; height: 250px; "  loop autoplay></lottie-player>
                        <h3 class="title">¿Cuál es tu propósito?</h3>
                        <p class="text">Selecciona uno o varios</p>

                        <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                            <span class="material-icons text-field-icons">
                            storefront
                            </span>
                            <div class="mb-3">
                                <input type="text" class="form-control text-field" name="nombreEmprendimiento" id="nombreEmprendimiento" placeholder="Nombre de tu emprendimiento"/>
                            </div>
                        </div>

                        <!-- <section class="parent">
                            <div class="selectable">
                                <h3 class="subtitle">Página web</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">App</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">Administración</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">Mantenimiento</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">Tienda Online</h3>
                            </div>
                            <div class="selectable">
                                <h3 class="subtitle">Aplicación a la medida</h3>
                            </div>

                        </section>  -->

                    </div>

                    <div class="swiper-slide">
                        <lottie-player src="../../recursos/animaciones/write3d.json" class="animate__animated animate__bounceIn" background="transparent"  speed="1"  style="width: 250px; height: 250px; "  loop autoplay></lottie-player>
                        <h3 class="title">¡Gracias por responder!</h3>
                        <p class="text">Nos pondremos en contacto contigo lo más pronto posible</p>
                        <button class="button">
                            Enviar Formulario
                        </button>

                    </div>
                    
                </div>
              
               

                
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
                
            </div>
        </div>
        
    </form>

    
    

    </section>
    <?php
            //include_once __DIR__.'/php/footer.php';    
            include __DIR__.'./../../php/scripts/scriptsJS.php'
        ?>  
</body>
</html>
