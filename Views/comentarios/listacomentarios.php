<?php require('../../Controller/Conexion.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in())
{ 
    header('Location: ../auth/login.php'); 
    exit(); 
}else if(!($user->rol($_SESSION['username'])=="Admin"))
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