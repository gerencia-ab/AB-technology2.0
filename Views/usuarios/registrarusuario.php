<?php 
    require('../../Controller/Conexion.php'); 

    if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }else if(!($user->permisoregistrar($_SESSION['username'])==2))
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
                    <form id="frm-comment" enctype="multipart/form-data" method="POST">
                    <h3 class="fw-bold mb-5" style="color: #FFFFFF; text-align: center;">Registrar Usuario:</h3>
                            
                        <input id="nombres" type="text" name="nombres" id="nombres" placeholder="Nombres" class="form-control mb-3" />

                        <input id="apellidos" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="form-control mb-3" />

                        <input id="telefono" type="text" name="telefono" id="telefono" placeholder="Telefono" class="form-control mb-3" />

                        <input type="text" name="username" id="username" placeholder="Username" class="form-control mb-3" />
                            
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-3" />
                                
                        <input type="email" name="correo" id="correo" placeholder="Correo" class="form-control mb-3" />

                        <div class="form-group">
                            <input type="file" id="file" name="file[]" required>
                        </div>
                                
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