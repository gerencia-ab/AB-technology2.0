<?php require('../../Controller/Conexion.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in())
{ 
    header('Location: ../auth/login.php'); 
    exit(); 
}else if(!($user->permisoleer($_SESSION['username'])==1))
{
    header('Location: ../auth/memberpage.php'); 
    exit(); 
}


?>
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
        <div style="height: 150px;"></div>
    </header>
    <div class="container">
            <div class="row">
            
                <div class="comentario">
                <h2 class="mt-4 mb-5" style="color: white; text-align: center;">Comentarios por aprobar</h2>
                    <div class="comment-form-container"></div>
                    <div id="listaDeComentarios">

                    </div>
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
    listComments(5);
});
</script>