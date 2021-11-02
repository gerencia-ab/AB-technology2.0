<?php require('Controller/Conexion.php'); 
if(!$user->is_logged_in())
{ 
    header('Location: login.php'); 
    exit(); 
}else if(!($user->rol($_SESSION['username'])=="Admin"))
{
    header('Location: memberpage.php'); 
    exit(); 
}else if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
$sentencia = $conn->prepare("SELECT * FROM members WHERE memberID = ?;");
$sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
if($persona === FALSE){
	header('Location: memberpage.php'); 
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once __DIR__.'/php/scripts/scriptsCSS.php';
    ?>
</head>
   
<body>
    <header class="bg-primary text-center">
        <?php
            include_once __DIR__.'/php/header.php';
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
                           value="Actualizar" />
				<div style="clear:both"></div>
            </form>
        </div>
    <?php
        include_once __DIR__.'/php/footer.php';    
        include __DIR__.'/php/scripts/scriptsJS.php'
    ?>    
</body>
</html>

<script>
    $("#submitButton2").click(function () {
    $("#comment-message").css('display', 'none');
    var str = $("#frm-comment").serialize();
    console.log(str);
    $.ajax({
        url: "Controller/ActualizarUsuario.php",
        data: str,
        type: 'post',
        success: function (response)
        {
                console.log(response);
                $("#comment-message").css('display', 'inline-block');
                $("#username").val("");
                $("#correo").val("");
                $("#password").val("");
                window.location.href = 'listausuarios.php';
           
        }
    });
});
</script>