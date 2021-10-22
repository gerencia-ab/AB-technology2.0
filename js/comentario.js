

function postReply(commentId) {
    $('#commentId').val(commentId);
    $("#name").focus();
}

$("#submitButton").click(function () {
    $("#comment-message").css('display', 'none');
    var tel = document.getElementById('telefono').value;
    var nombre = document.getElementById('telefono').value;
    var comentario = document.getElementById('telefono').value;
    var valoresAceptados = /^[0-9]+$/;
    var email = document.getElementById('correo').value;
       if (!tel.match(valoresAceptados) || email == ""|| tel =="" || nombre =="" || comentario == ""){

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
    //console.log(str);
    $.ajax({
        url: "Controller/AgregarComentario.php",
        data: str,
        type: 'post',
        success: function (response)
        {
       
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
}});

$(document).ready(function () {
    listComment(5);
});

function listComment(pag) {
    $.post("Controller/ListaDeComentarios.php",
            function (data) {
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
            });
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



             





