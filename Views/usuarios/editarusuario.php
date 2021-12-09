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
    $sentencia = $conn->prepare("SELECT * FROM members WHERE memberID = ?;");
    $sentencia->execute([$id]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    if($persona === FALSE){
        header('Location: ../auth/memberpage.php'); 
        exit();
    }
    $sql= "SELECT roles.* FROM roles";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $record_set = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($record_set, $row);
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
                            <input type="hidden" name="id" value="<?php echo $persona->memberID; ?>">
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?php echo $persona->username ?>" />
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="email" name="correo" id="correo" placeholder="Correo" value="<?php echo $persona->email ?>"/>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="nombres" id="nombres" placeholder="Nombres" value="<?php echo $persona->nombres ?>"/>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo $persona->apellidos ?>"/>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $persona->telefono ?>"/>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="rol">Rol </label>
                            <select name="rol" class="form-control" id="rol" style="margin:20px; width: 50%;">
                                <?php 
                                foreach ($record_set as $rol) {
                                ?>
                                    <option value="<?php echo $rol['id']; ?>"><?php echo $rol['name']; ?></option>
                                <?php 
                                }
                                ?>
                        </select>
                        </div>
                        <div class="mb-3 text-center">
                            <input type="button" class="btn btn-outline-primary" id="submitButton2" value="Actualizar" onclick="actualizarUsuario()">
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