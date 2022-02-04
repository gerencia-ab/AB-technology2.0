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
    <div style="height: 180px;"></div>

    <section class="p-2" id="requerimientos">
        <div class="embed-responsive embed-responsive-16by9" style="text-align: center;">
            <iframe class="embed-responsive-item" src="../../recursos/pdf/politica-tratamiento-datos-personales.pdf" allowfullscreen style="width: 96%; height: 700px;"></iframe>
        </div>
    </section>

    <script src="http://localhost/AB-technology2.0/js/mail.js"></script>
    <?php
            //include_once __DIR__.'/php/footer.php';    
            include __DIR__.'./../../php/scripts/scriptsJS.php'
        ?>  
        
</body>
</html>
