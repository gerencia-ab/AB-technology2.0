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
                    <input type="hidden" name="comentario_id" id="commentId"
                           placeholder="Name" /> 
                    <input class="input-field"
                           type="text" name="name" id="name" placeholder="Nombres" />
                      </div>
                      <input class="input-field"
                           type="text" name="telefono" id="telefono" placeholder="Telefono" />
                      </div>
                      <input class="input-field"
                           type="email" name="correo" id="correo" placeholder="Correo" />
                      </div>
                <div class="input-row">
                    <textarea class="input-field" type="text" name="comment"
                              id="comment" placeholder="Agregar comentario">  </textarea>
                </div>
                <div>
                    <input type="button" class="btn-submit" id="submitButton"
                           value="Publicar Ahora" />
				<div style="clear:both"></div>
            </form>
        </div>
        <div id="output"></div>
    <?php
        include_once __DIR__.'/php/footer.php';    
        include __DIR__.'/php/scripts/scriptsJS.php'
    ?>    
</body>
</html>
<script src="js/comentario.js"></script>