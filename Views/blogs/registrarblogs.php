<?php 
    require('../../Controller/Conexion.php'); 

    if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }else if(!($user->permiso($_SESSION['username'])==2))
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
    <div class="comment-form-container">
    <p class="statusMsg"></p>
    <form enctype="multipart/form-data" id="fupForm" method="POST" >
        <div class="form-group">
            <label for="name">NAME</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo del blog" required />
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea rows="10" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion del blog" required ></textarea>
        </div>
        <div class="form-group">
            <input type="file" id="file" name="file[]" required multiple>
        </div>
        <input type="button" class="btn-submit" id="submitButton"
                           value="Registrar" onclick="subirImagenes()" />
    </form>
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

