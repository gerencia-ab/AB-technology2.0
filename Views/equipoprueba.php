<?php 
ini_set('display_errors', 1); 
error_reporting(E_ALL);

    require('../Controller/Conexion.php'); 
    if(!isset($_GET["id"])) exit();
    $id = $_GET["id"];
    $sentencia = $conn->prepare("SELECT * FROM equipo WHERE id = ?;");
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
        include_once '../php/scripts/scriptsCSS.php';
    ?>
</head>
    <body>
        
        <?php
            include_once '../php/header.php';
        ?>



    <div class="container" >
        <div class="row" >
            <div style="margin-top: 100px;"></div>
            <h2 class="blog-titulo" style="color: #FFFFFF;">Nuestro Equipo</h2>
            <div class="col xs sm md lg quienes-somos mt-5" style="max-width: 800px; margin: auto;">
                <div style="display: flex; flex-direction: column; justify-content: center;">
                <h2 class="blog-titulo" style="margin-bottom: 25px" id="nombre"> <?php echo strtoupper($persona->nombre); ?></h2>
                <img src="<?php echo $persona->imagen; ?>" width="300px" height="300px" style="object-fit: cover; border-radius: 50%; margin: auto;" />
                <p class="mt-5" style="text-align: center; font-size: 32px;" id="cargo">
                    <?php echo $persona->cargo; ?>
                </p>
                <p style="text-align: center;" id="funcion">
                    <?php echo $persona->funcion; ?>
                </p>
                <div class="mt-3" style="border: 2px solid white; padding: 25px; display: flex; flex-direction: column; justify-content: center; max-width: 50%; min-width: 600px; border-radius: 15px; margin: auto;">
                    <p class="mt-4" style="text-align: justify;" id="resumen">
                        <?php echo nl2br($persona->resumen); ?>
                    </p>
                </div>
                <div class="mt-3" style="border: 2px solid white; padding: 25px; display: flex; flex-direction: column; justify-content: center; max-width: 50%; min-width: 250px; border-radius: 15px; margin: auto;">
                    <span class="material-icons" style="color: #FFF;margin: auto; font-size: 36px;">email</span>
                    <p class="mt-4" style="text-align: center;" id="correo">
                        <?php echo $persona->correo; ?>
                    </p>

                    <?php if($persona->instagram != "notiene") 
                    {?>
                     <img src="../recursos/imagenes/logo_instagram.webp" width="30px" style="margin:auto;"/>
                    <p class="mt-4" style="text-align: center;" id="instagram">
                        <?php echo $persona->instagram; ?>
                    </p>
                    <?php
                    }
                    ?>
                    <?php
                    if($persona->facebook != "notiene") 
                    {?>
                    
                    <img src="../recursos/imagenes/facebook-logo.webp" width="30px" style="margin:auto;"/>
                    <p class="mt-4" style="text-align: center;" id="facebook"> 
                        <?php echo $persona->facebook; ?>
                    </p>
                    <?php
                    }
                    if($persona->tiktok != "notiene") 
                    {?>
                    <p class="mt-4" style="text-align: center;" id="tiktok"> 
                        <?php echo $persona->tiktok; ?>
                    </p>
                    <?php
                    }
                    if($persona->linkedin != "notiene") 
                    {?>
                    <p class="mt-4" style="text-align: center;" id="linedin"> 
                        <?php echo $persona->linkedin; ?>
                    </p>
                    <?php
                    }?>
                </div>
                <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#modal-javier" style="max-width: 350px; margin: auto;">
                    Mas Informacion
                </button>
            </div>
                
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal-javier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body" id="modal">
                            <?php echo nl2br($persona->biografia); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <?php
            include_once '../php/footer.php';    
            include '../php/scripts/scriptsJS.php'
        ?>    
</body>



</html>