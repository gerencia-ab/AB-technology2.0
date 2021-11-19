<?php require('../../Controller/Conexion.php'); 
if(!$user->is_logged_in())
{ 
    header('Location: ../auth/login.php'); 
    exit(); 
}else if(!($user->rol($_SESSION['username'])=="Admin"))
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
                    <input type="hidden" name="id" value="<?php echo $persona->memberID; ?>">
                    <input class="input-field"
                           type="text" name="username" id="username" placeholder="Username" value="<?php echo $persona->username ?>" />
                      </div>
                      <input class="input-field"
                           type="email" name="correo" id="correo" placeholder="Correo" value="<?php echo $persona->email ?>"/>
                      </div>
                      <div class="form-group">
                            <label for="rol">Rol </label>
                                 <select name="rol" class="form-control" id="rol">
                                     <option value="1">Admin</option>
                                     <option value="2">Personal</option>
                                 </select>
                      <div>
                    <input type="button" class="btn-submit" id="submitButton2"
                           value="Actualizar" onclick="actualizarUsuario()"/>
				<div style="clear:both"></div>
            </form>
        </div>
    <?php
        include_once '../../php/footer.php';    
        include '../../php/scripts/scriptsJS.php'
    ?>    
</body>
</html>

<script src="../../js/funciones.js">
    
</script>