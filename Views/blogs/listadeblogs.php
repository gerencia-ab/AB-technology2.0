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
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 mt-5 panelAdministrativo">
                    <div class="text-center">
                        <h2>Lista de Blogs</h2>
                    </div> 
                    <div id="output"></div>
                </div>
            </div>
        </div>
        <div class="auxFooter">
            <?php
                include_once '../../php/footer.php';    
                include '../../php/scripts/scriptsJS.php'
            ?>    
        </div>
    </body>
</html>
<script src="../../js/funciones.js" ></script>
<script>
$(document).ready(function () {
    listblogusuario(5);
});
</script>