<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once __DIR__.'/php/scripts/scriptsCSS.php';
    ?>
</head>
   
<body>
    <header class="bg-primary text-center">
        <?php
            include_once __DIR__.'/php/header.php';
        ?>
        <h1>Encabezado</h1>
    </header>

    <div class="bg-secondary text-center">        
        <video id="background-video" autoplay loop muted poster="recursos/imagenes/imgFondo1.png">
        <source src="recursos/videos/video1.mp4" type="video/mp4">
        </video>
    </div>

    <div class="p-2">
        <?php
            include_once __DIR__.'/php/contacto.php';
        ?>
    </div>

    <?php
        include_once __DIR__.'/php/footer.php';    
        include __DIR__.'/php/scripts/scriptsJS.php'
    ?>    
</body>
</html>