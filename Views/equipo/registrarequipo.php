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
        <div class="container">
            <div class="row">
                <div class="col-11 col-sm-10 col-md-8 col-lg-6 edicionUsuario" style="margin: auto;">
                    <form id="frm-comment" enctype="multipart/form-data" method="POST">
                    <h3 class="fw-bold mb-5" style="color: #FFFFFF; text-align: center;">Registrar Usuario de equipo:</h3>
                            
                        <input id="nombre" type="text" name="nombre" id="nombre" placeholder="Nombre Completo" class="form-control mb-3" />

                        <input id="cargo" type="text" name="cargo" id="cargo" placeholder="Cargo dentro de la empresa" class="form-control mb-3" />

                        <input id="funcione" type="text" name="funcione" placeholder="Funcion dentro de la empresa" class="form-control mb-3" />

                        <textarea rows="10" type="text" name="resumen" id="resumen" placeholder="Pequeño resumen" class="form-control mb-3" ></textarea>

                        <textarea rows="10" type="text" name="biografia" id="biografia" placeholder="Biografia" class="form-control mb-3" ></textarea>
                        
                        <input type="email" name="correo" id="correo" placeholder="Correo" class="form-control mb-3" />
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" id="in" value="in" name="in" onchange="showIn()">
                             <label class="form-check-label" for="exampleCheck1">Instagram</label>
                        </div>
                        <div id="ins" style="display: none;">

                            <input type="text" name="instagram" id="instagram" placeholder="Instagram" class="form-control mb-3" />

                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" id="fb" value="fb" name="fb" onchange="showFb()">
                             <label class="form-check-label" for="exampleCheck1">Facebook</label>
                        </div>
                        <div id="fcb" style="display: none;">

                            <input type="text" name="facebook" id="facebook" placeholder="Facebook" class="form-control mb-3" />

                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" id="tk" value="tk" name="tk" onchange="showTk()">
                             <label class="form-check-label" for="exampleCheck1">TikTok</label>
                        </div>
                        <div id="tik" style="display: none;">

                            <input type="text" name="tiktok" id="tiktok" placeholder="Tiktok" class="form-control mb-3" />

                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" id="lk" value="lk" name="lk" onchange="showLk()">
                             <label class="form-check-label" for="exampleCheck1">Linkedin</label>
                        </div>
                        <div id="link" style="display: none;">

                            <input type="text" name="linkedin" id="linkedin" placeholder="Linkedin" class="form-control mb-3" />

                        </div>

                        <div class="form-group">
                            <input type="file" id="file" name="file[]" required>
                        </div>
          
                        <input type="button" class="btn btn-outline-primary" id="submitButton" value="Registrar" onclick="registrarEquipo()" style="margin:auto;"/>
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
<script type="text/javascript">
    function showIn() {
        element = document.getElementById("ins");
        check = document.getElementById("in");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
    function showFb() {
        element = document.getElementById("fcb");
        check = document.getElementById("fb");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
    function showTk() {
        element = document.getElementById("tik");
        check = document.getElementById("tk");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
    function showLk() {
        element = document.getElementById("link");
        check = document.getElementById("lk");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>
<script src="../../js/funciones.js"></script>