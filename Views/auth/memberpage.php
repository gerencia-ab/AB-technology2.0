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
                        <h2 class="mt-4">Bienvenido al panel administrativo</h2>
                        <div class="mt-4 text-center" style="border: 2px solid white; padding: 10px;font-weight: bold; border-radius: 10px; width:60%; margin: auto;">
                        <h2 style="font-weight: bold;"><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?></h2>
                            <span class="material-icons mt-2">admin_panel_settings</span>    
                            <p>
                                Administrador
                            </p>
                            <div style="display: inline-grid; grid-template-columns: 1fr 1fr; column-gap: 10px;"> 
                                <div class="mb-3 text-center">
                                    <a class="btn btn-outline-warning" href='../usuarios/editarperfil.php' style="cursor: pointer;">Editar mi perfil</a>
                                </div>
                                <div class="mb-3 text-center">
                                    <a class="btn btn-outline-danger" href='../auth/logout.php' style="cursor: pointer;">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>                    
                    <?php if($user->permisoleer($_SESSION['username'])==1){ ?>
                        
                        <div style="width:100%">




                        <div class="accordion accordion-flush bg-dark" id="accordionFlushExample" >

                            <div class="accordion-item mt-4" style="background-color: #191B2A;">
                                <h2 class="accordion-header" id="flush-headingOne">
                                <button style="background-color: #3e4765; color: #FFFFFF" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" >
                                    Acciones
                                    <div style="width: 100%; text-align: right;">
                                        <span class="material-icons">
                                        expand_more
                                        </span>
                                    </div>
                                    
                                </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <!-- Primera fila -->
                                    <div class="mt-4" style="display: inline-grid; grid-template-columns: 1fr 1fr 1fr; column-gap: 10px; width:100%;"> 
                                        <div class="mb-3 text-center">
                                            <a class="btn btn-outline-warning" href='../usuarios/listausuarios.php' style="cursor: pointer;">ver usuarios</a>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <a class="btn btn-outline-warning" href='../roles/listaderoles.php' style="cursor: pointer;">ver roles</a>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <a class="btn btn-outline-warning" href='../equipo/listaequipo.php' style="cursor: pointer;">ver equipo</a>
                                        </div>
                                    </div>
                                    <!-- Segunda fila -->
                                    <div class="mt-4" style="display: inline-grid; grid-template-columns: 1fr 1fr; column-gap: 10px; width:100%;"> 
                                        <div class="mb-3 text-center">
                                            <a class="btn btn-outline-success" href='../comentarios/listacomentarios.php'>ver comentarios por aprobar</a>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <a class="btn btn-outline-success" href='../blogs/listablogs.php'>ver blogs publicados</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>                       
                        </div>



                            
                            


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