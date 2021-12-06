<?php 
    require('../../Controller/Conexion.php'); 
    if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }else if(!($user->permisomodificar($_SESSION['username'])==3))
    {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
    }else if(!isset($_GET["id"])) exit();
    $id = $_GET["id"];
    $sentencia = $conn->prepare("SELECT * FROM roles WHERE id = ?;");
    $sentencia->execute([$id]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    
    if($persona === FALSE){
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
                        <div class="mb-3">
                            <input type="hidden" name="id" id="id" value="<?php echo $persona->id; ?>">
                            <input class="form-control" type="text" name="rol" id="rol" placeholder="Nombre del rol" value="<?php echo $persona->name ?>" />
                        </div>
                        <div class="select_search_box">
                        <label for="rol" style="ml-3">Permisos: </label>

                        <select name="permisos[]" id="permisos" class="w-50" data-show-subtext="true" data-live-search="true" multiple>
                            <option value="1">Leer</option>
                            <option value="2">Registrar</option>
                            <option value="3">Modificar</option>
                            <option value="4">Eliminar</option>
                        </select>
                        </div>
                        <div class="mb-3 text-center">
                            <input type="button" class="btn btn-outline-primary" id="submitButton2" value="Actualizar" onclick="actualizarRol()">
                        </div>
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