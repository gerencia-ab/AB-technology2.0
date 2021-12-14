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

    <div class="col-11 col-sm-10 col-md-8 col-lg-6 edicionUsuario" style="margin: auto;">
        <h2 class="mb-5" style="color: white; text-align: center;">Editar Perfil</h2>
        <div class="comment-form-container">
            <p class="statusMsg"></p>
            <form enctype="multipart/form-data" id="fupForm" method="POST" >
                <div class="form-group">
                    <label for="name" style="color: white;" class="mt-4">Titulo: </label>
                    <input type="text" class="form-control mt-3" id="titulo" name="titulo" placeholder="Titulo del blog" required />
                </div>
                <div class="form-group">
                    <label for="descripcion" style="color: white;" class="mt-5">Descripción:</label>
                    <textarea rows="10" class="form-control mt-3" id="descripcion" name="descripcion" placeholder="Descripcion del blog" required ></textarea>
                </div>
                <div class="form-group m-4" style="width: 100%; margin: auto;">
                    <input type="file" id="file" name="file[]" required multiple class="btn btn-outline-primary m-2">
                    <input type="button" class="btn btn-outline-primary m-2" id="submitButton" value="Registrar" onclick="subirImagenes()" />
                </div>
                
            </form>
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

