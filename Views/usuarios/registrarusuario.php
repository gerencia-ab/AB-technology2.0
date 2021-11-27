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
            <div class="col-11 col-sm-10 col-md-8 col-lg-6 edicionUsuario" style="margin: auto;">
                <form id="frm-comment">
                <h3 class="fw-bold mb-5" style="color: #FFFFFF; text-align: center;">Registrar Usuario:</h3>
                        
                    <input id="loginUsername" type="text" name="username" id="username" placeholder="Username" class="form-control mb-3" />
                        
                    <input id="loginPass" type="password" name="password" id="password" placeholder="Password" class="form-control mb-3" />
                            
                    <input type="email" name="correo" id="correo" placeholder="Correo" class="form-control mb-3" />
                            
                    <label for="rol" style="ml-3">Rol: </label>

                    <select name="rol" class="form-control" id="rol" style="margin:20px; width: 50%;">
                        <option value="1">Admin</option>
                        <option value="2">Personal</option>
                    </select>
                            
                            <input type="button" class="btn btn-outline-primary" id="submitButton" value="Registrar" onclick="registrarUsuario()" style="margin:auto;"/>

                
                </form>
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
<script src="../../js/funciones.js"></script>