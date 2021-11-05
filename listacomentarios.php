<?php require('Controller/Conexion.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in())
{ 
    header('Location: login.php'); 
    exit(); 
}else if(!($user->rol($_SESSION['username'])=="Admin"))
{
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
    <div>
  
	<div style="clear:both"></div>
    <div class="comment-form-container">

        </div>
        <div id="output"></div>
    <?php
        include_once __DIR__.'/php/footer.php';    
        include __DIR__.'/php/scripts/scriptsJS.php'
    ?>    
</body>
</html>
<script >
$(document).ready(function () {
    listComment(5);
});

function listComment(pag) {
    $.post("Controller/ListarComentarios.php",
            function (data) {
                console.log(data)
                var data = JSON.parse(data);

                var comments = "";
                var item = "";
                var parent = -1;

                
                var thead = "\
                              <thead>\
                                <tr>\
                                 <th>nombre</th>\
                                 <th>comentario</th>\
                                 <th>fecha</th>\
                                 <th>correo</th>\
                                 <th>telefono</th>\
                                </tr>\
                             </thead>"
                var list = $("<table class='table contenido-tabla'>").html(thead);
                var item = $("<tr>").html(comments);

                var long = pag;
                var cont = pag;
                if(long > data.length)
                {
                    long = data.length;

                }
                for (var i = 0; (i < long); i++)
                {   
                        var id=data[i]['comentario_id'];
                        comments = "\
                                    <td>" + data[i]['comment_sender_name'] +"</td>\
                                    <td>" + data[i]['comment'] + "</td>\
                                    <td>" + data[i]['date'] + "<td>\
                                    <td>" + data[i]['correo'] + "<td>\
                                    <td>" + data[i]['telefono'] + "<td>\
                                    <td><a href='Controller/AprobarComent.php?id=" + id + "'" + "><button type='button' class='btn btn-warning'>Aprobar</button></a><td>\
                                    <td><a href='Controller/EliminarComent.php?id=" + id + "'" + "><button type='button' class='btn btn-warning'>Eliminar</button></a><td>";
                                    

                        var item = $("<tr>").html(comments);
                        list.append(item);
                    
                }
                cont = cont + 5;
                var mas ="\<a class='btn-reply' onClick='listComment(" + cont + ")'>Mas comentarios</a>";
                var item = $("<tr>").html(mas);
                list.append(item);
                $("#output").html(list);
            });
}

</script>