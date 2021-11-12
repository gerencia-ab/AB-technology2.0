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
        <h1>Encabezado</h1>
    </header>
    <div class="comment-form-container">
    <form id="frm-comment">
                <div class="input-row">
                    <input class="input-field"
                           type="text" name="username" id="username" placeholder="Username" />
                      </div>
                      <input class="input-field"
                           type="password" name="password" id="password" placeholder="Password" />
                      </div>
                      <input class="input-field"
                           type="email" name="correo" id="correo" placeholder="Correo" />
                      </div>
                      <div class="form-group">
                            <label for="rol">Rol </label>
                                 <select name="rol" class="form-control" id="rol">
                                     <option value="1">Admin</option>
                                     <option value="2">Personal</option>
                                 </select>
                      <div>
                    <input type="button" class="btn-submit" id="submitButton"
                           value="Registrar" onclick="registrarUsuario()" />
				<div style="clear:both"></div>
            </form>
        </div>
    <?php
        include_once '../../php/footer.php';    
        include '../../php/scripts/scriptsJS.php'
    ?>    
</body>
</html>
<script src="../../js/funciones.js"></script>