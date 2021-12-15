<?php 
    require('../../Controller/Conexion.php'); 

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
    <div class="container usuario" style="color:#FFFFFF; text-align: center;">
        
        <div id="output"></div>
        <a href='registrarblogs.php' class="btn btn-outline-primary">Registrar blog</a>
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
        listblogimagen(5);
    });
</script>