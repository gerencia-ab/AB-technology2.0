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
        <div>
            <div class="form-container">

                <div class="swiper" id="formularioRequerimientos">
                    <div class="swiper-wrapper">

                        <!-- Slide Inicio -->
                        <div class="swiper-slide">
                            <div class="form-slide">
                                <lottie-player src="../../recursos/animaciones/write3d.json" class="animate__animated animate__bounceIn" background="transparent"  speed="1"  style="width: 250px; height: 250px;"  loop autoplay></lottie-player>
                                <h3 class="title">¡Hola!</h3>
                                <p class="text">Bienvenido al formulario de requerimientos, 
                                    te haremos unas preguntas sobre el servicio que necesitas 
                                    y nos pondremos en contacto contigo lo más pronto posible 
                                    para ofrecerte una asesoría más personalizada.
                                </p>
                                <p class="text">Primero danos tu información de contacto:</p>

                                <hr>

                                <!-- Campo de texto nombre -->
                                <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                                    <div></div>
                                    <p class="text-label">Nombre:</p>
                                </div>
                                <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                                    <span class="material-icons text-field-icons">
                                    badge
                                    </span>
                                    <div class="mb-3">
                                        <input class="form-control text-field" type="text" name="nombre" id="nombre" placeholder=""/>
                                    </div>
                                </div>

                                <!-- Campo de texto email -->
                                <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                                    <div></div>
                                    <p class="text-label">Email:</p>
                                </div>
                                <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                                    <span class="material-icons text-field-icons">
                                    mail
                                    </span>
                                    <div class="mb-3">
                                        <input class="form-control text-field" type="email" name="email" id="email" placeholder=""/>
                                    </div>
                                </div>

                                <!-- Campo de texto teléfono -->
                                <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                                    <div></div>
                                    <p class="text-label">Teléfono:</p>
                                </div>
                                <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                                    <span class="material-icons text-field-icons">
                                    call
                                    </span>
                                    <div class="mb-3">
                                        <input class="form-control text-field" type="tel" name="celular" id="celular" placeholder=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide Servicios -->
                        <div class="swiper-slide mb-4">
                            <div class="form-slide">
                                <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_hi95bvmx/WebdesignBg.json" class="animate__animated animate__bounceIn" background="transparent"  speed="1"  style="width: 250px; height: 250px; "  loop autoplay></lottie-player>
                                <h3 class="title">¿Qué servicio necesitas?</h3>
                                <p class="text">Selecciona uno o varios</p>

                                <hr>

                                <!-- Cuadros seleccionables de servicios -->
                                <section class="parent">
                                    <div class="selectable">
                                        <h3 class="subtitle">Página web</h3>
                                        <div class="checkbox">
                                            <input type="checkbox" id="cbPaginaWeb" value="Pagina_web">
                                            <label for="cbPaginaWeb"></label>
                                        </div>
                                    </div>
                                    <div class="selectable">
                                        <h3 class="subtitle">App</h3>
                                        <div class="checkbox">
                                            <input type="checkbox" id="cbApp" value="App">
                                            <label for="cbApp"></label>
                                        </div>
                                    </div>
                                    <div class="selectable">
                                        <h3 class="subtitle">Administración</h3>
                                        <div class="checkbox">
                                            <input type="checkbox" id="cbAdministracion" value="Administracion">
                                            <label for="cbAdministracion"></label>
                                        </div>
                                    </div>
                                    <div class="selectable">
                                        <h3 class="subtitle">Mantenimiento</h3>
                                        <div class="checkbox">
                                            <input type="checkbox" id="cbMantenimiento" value="Mantenimiento">
                                            <label for="cbMantenimiento"></label>
                                        </div>
                                    </div>
                                    <div class="selectable">
                                        <h3 class="subtitle">Tienda Online</h3>
                                        <div class="checkbox">
                                            <input type="checkbox" id="cbTiendaOnline" value="Tienda_online">
                                            <label for="cbTiendaOnline"></label>
                                        </div>
                                    </div>
                                    <div class="selectable">
                                        <h3 class="subtitle">Aplicación a la medida</h3>
                                        <div class="checkbox">
                                            <input type="checkbox" id="cbAplicacionMedida" value="Aplicacion_medida">
                                            <label for="cbAplicacionMedida"></label>
                                        </div>
                                    </div>
                                </section> 
                            </div>
                        </div>
                        
                        <!-- Slide Meta -->
                        <div class="swiper-slide">
                            <div class="form-slide">
                                <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_7fy2yzzs.json" class="animate__animated animate__bounceIn" background="transparent"  speed="1"  style="width: 250px; height: 250px; "  loop autoplay></lottie-player>
                                <h3 class="title">¿Cuál es tu meta?</h3>
                                <p class="text">Selecciona uno o varios</p>

                                <hr>

                                <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                                    <div></div>
                                    <p class="text-label">Nombre de tu emprendimiento:</p>
                                </div>
                                <div class="mb-3" style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                                    <span class="material-icons text-field-icons">
                                    storefront
                                    </span>
                                    <div class="mb-3">
                                        <input type="text" class="form-control text-field" name="nombreEmprendimiento" id="nombreEmprendimiento" placeholder=""/>
                                    </div>
                                </div>
                                <div class="mb-2" style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                                    <span class="material-icons text-field-icons">
                                    flag
                                    </span>
                                    <p class="text-label">Describe tu meta:</p>
                                </div>
                                <div class="text-center">
                                    <textarea class="textarea" name="textarea" id="meta" rows="10" cols="50"></textarea>
                                </div>
                                
                            </div>
                        </div>
                        
                        <!-- Slide de contacto -->
                        <div class="swiper-slide">
                            <div class="form-slide">
                                <lottie-player src="https://assets1.lottiefiles.com/private_files/lf30_2dlzxeim.json" class="animate__animated animate__bounceIn" background="transparent"  speed="1"  style="width: 250px; height: 250px; "  loop autoplay></lottie-player>
                                <h3 class="title">¡Gracias por responder!</h3>
                                <p class="text">Nos pondremos en contacto contigo lo más pronto posible</p>
                                <div class="text-center">
                                    <button class="button mb-4" onclick="enviarRequerimientos()">
                                        Enviar Formulario
                                    </button>
                                </div>
                            </div>
                        </div>
        
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="http://localhost/AB-technology2.0/js/mail.js"></script>
    <?php
            //include_once __DIR__.'/php/footer.php';    
            include __DIR__.'./../../php/scripts/scriptsJS.php'
        ?>  
        
</body>
</html>
