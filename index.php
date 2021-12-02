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

    <div class="bg-secondary text-center cover-video">
        
        <video id="background-video" autoplay loop muted poster="recursos/imagenes/imgFondo1.webp">
            <source src="recursos/videos/video1.mp4" type="video/mp4">
            
        </video>

        

        <h1 class="cover-titulo"> Somos una empresa que planifica, construye y gestiona soluciones de software</h1>

        <img src="recursos/imagenes/flecha_abajo.svg" class="flecha"/>
        
            <div class="custom-shape-divider-bottom-1634938778">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>

        
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
        ?>
        <?php
            include_once __DIR__.'/php/contacto.php';
        ?>
        <?php
            include_once __DIR__.'/php/footer.php';    
            include __DIR__.'/php/scripts/scriptsJS.php'
        ?>    
    </body>
</html>