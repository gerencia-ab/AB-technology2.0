<?php 
    require('../../Controller/Conexion.php'); 
    if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }
    $id = $user->id($_SESSION['username']);
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
            <div style="height: 150px;"></div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-11 col-sm-10 col-md-8 col-lg-6 edicionUsuario" style="margin: auto;">
                <h2 class="mt-4 mb-5" style="color: white; text-align: center;">Editar Perfil</h2>
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_zfszhesy.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop autoplay></lottie-player>
                    <form id="frm-comment">
                    <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                        <p></p>
                        <p>Nombre de usuario</p>
                    </div>
                    
                    <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                        <span class="material-icons" style="font-size: 34px;">
                        account_circle
                        </span>
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?php echo $persona->memberID; ?>">
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?php echo $persona->username ?>" />
                        </div>
                    </div>
                        

                    
                    <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                    <span class="material-icons" style="font-size: 34px;">
                    email
                    </span>
                    <div class="mb-3">
                            <input class="form-control" type="email" name="correo" id="correo" placeholder="Correo" value="<?php echo $persona->email ?>"/>
                        </div>
                    </div>

                    
                    <div style="display: inline-grid; grid-template-columns: 0.5fr 3.5fr 3.5fr; column-gap: 10px; width:100%; align-items:center;">
                    <p></p>
                    <p>Nombre:</p>
                    <p>Apellidos:</p>
                    </div>
                    <div style="display: inline-grid; grid-template-columns: 0.5fr 3.5fr 3.5fr; column-gap: 10px; width:100%;">
                        <span class="material-icons" style="font-size: 34px;">
                        badge
                        </span>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="nombres" id="name" placeholder="Nombres" value="<?php echo $persona->nombres ?>"/>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo $persona->apellidos ?>"/>
                        </div>
                    </div>
                        
                    <div style="display: inline-grid; grid-template-columns: 0.5fr 7fr; column-gap: 10px; width:100%;">
                        <span class="material-icons" style="font-size: 34px;">
                        call
                        </span>    
                        <div class="mb-3">
                            <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $persona->telefono ?>"/>
                        </div>
                    </div>


                        


                        <div class="mb-3 text-center">
                            <input type="button" class="btn btn-outline-primary" id="submitButton2" value="Actualizar" onclick="actualizarPerfil()">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
            <?php
                include_once '../../php/footer.php';    
                include '../../php/scripts/scriptsJS.php'
            ?>
       
    </body>
</html>
<script src="../../js/funciones.js"></script>