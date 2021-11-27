<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include_once '../../php/scripts/scriptsCSS.php';
        ?>
    </head>
    
    <body>
        <header class="bg-primary text-center">
            <?php
                include_once '../../php/header.php';
            ?>
            <h1>Encabezado</h1>
        </header>

        <div class="container mt-5">
            <div class="row mt-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.031455018012!2d-72.46488197079421!3d7.881902199645104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x49a34436c130c41e!2zN8KwNTInNTQuOSJOIDcywrAyNyc1MS42Ilc!5e0!3m2!1sen!2sco!4v1638022945492!5m2!1sen!2sco" width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <?php
            include_once '../../php/footer.php';    
            include '../../php/scripts/scriptsJS.php'
        ?>    
    </body>
    <!-- Scripts adicionales -->
    <script src="../../js/funciones.js" ></script>
    <script>
        $(document).ready(function () {
            listComment(5);
        });       
    </script>
</html>
