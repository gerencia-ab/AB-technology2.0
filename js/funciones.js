function registrarUsuario(){
    $("#comment-message").css('display', 'none');
    var str = $("#frm-comment").serialize();
    console.log(str);
    var data = 'agregarUsuario';
    $.ajax({
        url: "../../Controller/UsuariosController.php",
        data: str + '&funcion=' + data,
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
}

function actualizarUsuario(){
    $("#comment-message").css('display', 'none');
    var str = $("#frm-comment").serialize();
    console.log(str);
    var data = 'actualizarUsuario';
    $.ajax({
        url: "../../Controller/UsuariosController.php",
        data: str + '&funcion=' + data,
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

}

function listUsuarios(pag) {
    var data = 'listarUsuario';
    console.log("entra en listarUsuario")
    $.ajax({
        url: "../../Controller/UsuariosController.php",
        data: '&funcion=' + data,
        type: 'post',
        success: function (data) {
                console.log(data)
                var data = JSON.parse(data);

                var comments = "";
                var item = "";
                var parent = -1;

                
                var thead = "\
                              <thead>\
                                <tr>\
                                 <th>usuario</th>\
                                 <th>email</th>\
                                 <th>estado</th>\
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
                        var id=data[i]['memberID'];
                        comments = "\
                                    <td>" + data[i]['username'] +"</td>\
                                    <td>" + data[i]['email'] + "</td>\
                                    <td>" + data[i]['active'] + "<td>\
                                    <td><a href='editarusuario.php?id=" + id + "'" + "><button type='button' class='btn btn-warning'>Editar</button></a><td>";
                                    

                        var item = $("<tr>").html(comments);
                        list.append(item);
                    
                }
                cont = cont + 5;
                var mas ="\<a class='btn-reply' onClick='listUsuario(" + cont + ")'>Mas usuarios</a>";
                var item = $("<tr>").html(mas);
                list.append(item);
                $("#output").html(list);
            }
        });
}
function listComments(pag) {
    var data = 'listarComentarios';
    $.ajax({
        url: "../../Controller/ComentariosController.php",
        data: '&funcion=' + data,
        type: 'post',
        success: function (data) {
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
                                    <td><a onClick='aprobarcomment(" + id + ")'><button type='button' class='btn btn-warning'>Aprobar</button></a><td>\
                                    <td><a onClick='eliminarcomment(" + id + ")'><button type='button' class='btn btn-warning'>Eliminar</button></a><td>";
                                    

                        var item = $("<tr>").html(comments);
                        list.append(item);
                    
                }
                cont = cont + 5;
                var mas ="\<a class='btn-reply' onClick='listComment(" + cont + ")'>Mas comentarios</a>";
                var item = $("<tr>").html(mas);
                list.append(item);
                $("#output").html(list);
            }
            });
}
function isValidEmail(mail) { 
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail); 
  }
  function validacionAsinc()
  {
    var email = document.getElementById('correo').value;
    var valido = isValidEmail(email);
    if(valido===false)
    {
        document.getElementById("valemail").innerHTML = "Correo invalido";
    }else{
        document.getElementById("valemail").innerHTML = "";
    }
  }
function agregarComentario(){
    $("#comment-message").css('display', 'none');
    var tel = document.getElementById('telefono').value;
    var nombre = document.getElementById('telefono').value;
    var comentario = document.getElementById('telefono').value;
    var valoresAceptados = /^[0-9]+$/;
    var email = document.getElementById('correo').value;
    var valido = isValidEmail(email);
       if (!tel.match(valoresAceptados) || valido==false || tel =="" || nombre =="" || comentario == ""){

        $("#comment-message").css('display', 'inline-block');
        $("#name").val("");
        $("#telefono").val("");
        $("#correo").val("");
        $("#comment").val("");
        $("#commentId").val("");
        $("#comment").val("");
        $("#commentId").val("");
        alert ("Datos incorrectos");
       } else {
        
      
    var str = $("#frm-comment").serialize();
    console.log(str);
    var data = 'agregarComentario';
    $.ajax({
        url: "../../Controller/ComentariosController.php",
        data: str + '&funcion=' + data,
        type: 'post',
        success: function (response)
        {
                console.log(response);
                $("#comment-message").css('display', 'inline-block');
                $("#name").val("");
                $("#telefono").val("");
                $("#correo").val("");
                $("#comment").val("");
                $("#commentId").val("");
                $("#comment").val("");
                $("#commentId").val("");
                listComment(5);
           
        }
    });
}
}

function postReply(commentId) {
    $('#commentId').val(commentId);
    $("#name").focus();
}

function listComment(pag) {
    var data = 'listarDeComentarios';
    $.ajax({
        url: "../../Controller/ComentariosController.php",
        data: '&funcion=' + data,
        type: 'post',
        success: function (data) {
                //console.log(data)
                var data = JSON.parse(data);

                var comments = "";
                var item = "";
                var parent = -1;

                var list = $("<ul class='outer-comment'>");
                var item = $("<li>").html(comments);

                var long = pag;
                var cont = pag;
                if(long > data.length)
                {
                    long = data.length;

                }
                for (var i = 0; (i < long); i++)
                {
                    var commentId = data[i]['comentario_id'];
                    parent = data[i]['parent_comentario_id'];
                    
                    if (parent == "0")
                    {
                        
                        comments = "\
                            <div class='comment-row'>\
                                <div class='comment-info'>\
                                    <span class='commet-row-label'>De</span>\
                                    <span class='posted-by'>" + data[i]['comment_sender_name'] + "</span>\
                                    <span class='commet-row-label'>a las </span> \
                                    <span class='posted-at'>" + data[i]['date'] + "</span>\
                                </div>\
                                <div class='comment-text'>" + data[i]['comment'] + "</div>\
                                <div>\
                                    <a class='btn-reply' onClick='postReply(" + commentId + ")'>Responder</a>\
                                </div>\
                            </div>";

                        var item = $("<li>").html(comments);
                        list.append(item);
                        var reply_list = $('<ul>');
                        item.append(reply_list);
                        listReplies(commentId, data, reply_list);
                    }
                }
                cont = cont + 5;
                mas ="\<a class='btn-reply' onClick='listComment(" + cont + ")'>Mas comentarios</a>";
                var item = $("<li>").html(mas);
                list.append(item);
                $("#output").html(list);
    }});
}

function listReplies(commentId, data, list) {

    for (var i = 0; (i < data.length); i++)
    {

       
        if (commentId == data[i].parent_comentario_id)
        {
            
            var comments = "\
                            <div class='comment-row'>\
                                <div class='comment-info'>\
                                    <span class='commet-row-label'>De </span>\
                                    <span class='posted-by'>" + data[i]['comment_sender_name'] + "</span>\
                                    <span class='commet-row-label'>a las </span> \
                                    <span class='posted-at'>" + data[i]['date'] + "</span>\
                                </div>\
                                <div class='comment-text'>" + data[i]['comment'] + "</div>\
                                <div>\
                                    <a class='btn-reply' onClick='postReply(" + data[i]['comentario_id'] + ")'>Responder</a>\
                                </div>\
                            </div>";

            var item = $("<li>").html(comments);
            var reply_list = $('<ul>');
            list.append(item);
            item.append(reply_list);
            listReplies(data[i].comentario_id, data, reply_list);
        }
    }
}

function aprobarcomment(id)
{
    $.ajax({
        url: "../../Controller/ComentariosController.php",
        data: {'id':id, 'funcion': 'aprobarComentario'},
        type: 'post',
        success: function (response)
        {
            location.reload();
        }
        });
}

function eliminarcomment(id)
{
    $.ajax({
        url: "../../Controller/ComentariosController.php",
        data:  {'id':id, 'funcion':'eliminarComentario'},
        type: 'post',
        success: function (response)
        {
            location.reload();
        }
    });
}