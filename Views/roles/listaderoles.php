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
                
                <div class="usuario">
                <h2 class="mt-4 mb-5" style="color: white; text-align: center;">Lista de Roles:</h2>                    
                    <!--<div class="comment-form-container"></div>-->
                    <div id="listaDeUsuarios">

                    </div>
                    <div id="botonesInferiores">
                        
                    </div>
                </div>                
            </div>
        </div>
        
        <div class="auxFooter"></div>
            <?php
                include_once '../../php/footer.php';    
                include '../../php/scripts/scriptsJS.php'
            ?>  
        
    </body>
</html>

<script src="../../js/funciones.js" ></script>
<script>
    $(document).ready(function () {
        listRoles(5);
    });
</script>