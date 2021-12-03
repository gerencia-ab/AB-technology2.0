<?php 
    require('../../Controller/Conexion.php'); 
    if(!$user->is_logged_in()){ header('Location: ../auth/login.php'); exit(); }
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
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 mt-5 panelAdministrativo">
                    <div class="text-center">
                        <h2>Bienvenido al panel administrativo <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?></h2>
                    </div>                    
                    <?php if($user->rol($_SESSION['username'])=="Admin"){ ?>
                        <div class="mb-3 text-center">
                            <span class="material-icons mt-2">admin_panel_settings</span>    
                            <p>
                                Administrador
                            </p>
                        </div>
                        <div class="mb-3 text-center">
                            <a class="btn btn-outline-warning" href='../usuarios/listausuarios.php' style="cursor: pointer;">ver usuarios</a>
                        </div>
                        <div class="mb-3 text-center">
                            <a class="btn btn-outline-success" href='../comentarios/listacomentarios.php'>ver comentarios por aprobar</a>
                        </div>
                        <div class="mb-3 text-center">
                            <a class="btn btn-outline-success" href='../blogs/listablogs.php'>ver blogs publicados</a>
                        </div>
                        <div class="mb-3 text-center">
                            <a class="btn btn-outline-danger" href='../auth/logout.php' style="cursor: pointer;">Cerrar sesión</a>
                        </div>
                    <?php } ?>
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