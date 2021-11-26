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

        <?php
            include_once '../../php/blog.php';
        ?>

        
        <br>        
        <div class="container listaComentarios">
            <h3 class="fw-bold" style="color: #FFFFFF; text-align: center;">Comentarios:</h3>
            <br>
            <div class="row">
                <div id="output">

                </div>
            </div>            
        </div>
        <br>
        <div class="container blog-comentar mt-5">
            <div class="row">
                <form id="frm-comment">
                    <input type="hidden" name="comentario_id" id="commentId">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre y apellido</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono">
                    </div>
                    
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" onblur="validacionAsinc()">
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Comentario</label>
                        <textarea class="form-control" type="text" name="comment" id="comment" placeholder="Agregar comentario"></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="button" class="btn btn-outline-primary" id="submitButton" value="Publicar Ahora" onclick="agregarComentario()" style="margin: auto;">
                    </div>
                    <div style="clear:both"></div>


                        <!--<input class="input-field" type="text" name="name" id="name" placeholder="Nombres"/>
                        </div>
                        <input class="input-field" name="telefono" type="number" id="telefono" placeholder="Telefono"/>
                        </div>
                        <input class="input-field" type="email" name="correo" id="correo" placeholder="Correo" onblur="validacionAsinc()"/>
                            <p id="valemail"></p>
                        </div>
                        <div class="input-row">
                            <textarea class="input-field" type="text" name="comment"id="comment" placeholder="Agregar comentario"></textarea>
                        </div>
                        <div>
                            <input type="button" class="btn-submit" id="submitButton" value="Publicar Ahora" onclick="agregarComentario()"/>
                        <div style="clear:both"></div>-->
                </form>
            </div>

        </div>
    
        <?php
            include_once '../../php/footer.php';    
            include '../../php/scripts/scriptsJS.php'
        ?>    
    </body>
    <!-- Scripts adicionales -->
    <script src="../../js/funciones.js" ></script>
    <script>
        $(document).ready(function () {
            listComment(5);
        });       
    </script>
</html>
