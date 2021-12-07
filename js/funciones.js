//USUARIOS
function registrarUsuario(){
    $("#comment-message").css('display', 'none');
    var str = $("#frm-comment").serialize();
    //console.log(str);
    var form_data = new FormData();
    form_data.append('funcion','agregarUsuario')
    form_data.append('nombres',document.getElementById("nombres").value)
    form_data.append('apellidos',document.getElementById("apellidos").value)
    form_data.append('rol',document.getElementById("rol").value)
    form_data.append('username',document.getElementById("username").value)
    form_data.append('correo',document.getElementById("correo").value)
    form_data.append('telefono',document.getElementById("telefono").value)
    form_data.append('password',document.getElementById("password").value)
    var totalfiles = document.getElementById("file").files.length;
    for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('file').files[index]);
    }
    var data = 'agregarUsuario';
    $.ajax({
        url: "../../Controller/UsuariosController.php",
        data: form_data,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (response)
        {
            //console.log(response);
            $("#comment-message").css('display', 'inline-block');
            $("#username").val("");
            $("#nombres").val("");
            $("#apellidos").val("");
            $("#telefono").val("");
            $("#correo").val("");
            $("#password").val("");
            window.location.href = 'listausuarios.php';
           
        }
    });
}

function actualizarUsuario(){
    $("#comment-message").css('display', 'none');
    var str = $("#frm-comment").serialize();
    //console.log(str);
    var data = 'actualizarUsuario';
    $.ajax({
        url: "../../Controller/UsuariosController.php",
        data: str + '&funcion=' + data,
        type: 'post',
        success: function (response)
        {
                //console.log(response);
                $("#comment-message").css('display', 'inline-block');
                $("#username").val("");
                $("#correo").val("");
                $("#password").val("");
                window.location.href = 'listausuarios.php';
           
        }
    });

}

function actualizarPerfil(){
    $("#comment-message").css('display', 'none');
    var str = $("#frm-comment").serialize();
    //console.log(str);
    var data = 'actualizarPerfil';
    $.ajax({
        url: "../../Controller/UsuariosController.php",
        data: str + '&funcion=' + data,
        type: 'post',
        success: function (response)
        {
                //console.log(response);
                $("#comment-message").css('display', 'inline-block');
                $("#username").val("");
                $("#correo").val("");
                $("#password").val("");
                window.location.href = '../auth/memberpage.php';
           
        }
    });

}

function listUsuarios(pag) {
    var data = 'listarUsuario';
    //console.log("entra en listarUsuario")
    $.ajax({
        url: "../../Controller/UsuariosController.php",
        data: '&funcion=' + data,
        type: 'post',
        success: function (data) {
                var data = JSON.parse(data);

                var comments = "";
                var item = "";
                var parent = -1;

                
                var thead = "\
                                <thead>\
                                <tr>\
                                    <th>Foto</th>\
                                    <th>Nombres</th>\
                                    <th>Apellidos</th>\
                                    <th>Telefono</th>\
                                    <th>Usuario</th>\
                                    <th>Correo</th>\
                                    <th>Estado</th>\
                                    <th>Acción</th>\
                                </tr>\
                                </thead>"
                var list = $("<table class='table table-hover contenido-tabla text-center text-white-50'>").html(thead);
                var item = $("<tr>").html(comments);

                var long = pag;
                var cont = pag;
                if(long > data.length)
                {
                    long = data.length;

                }
                for (var i = 0; (i < long); i++)
                {   
                var id=data[i]['memberID']
                let estado
                if (data[i]['active']=='yes') {
                    estado = 'Activo'
                } else {
                    estado = 'Inactivo'
                }
                comments = "\
                            <td><img src='" + data[i]['imagen'] +"' width=100px height=100px></td>\
                            <td>" + data[i]['nombres'] +"</td>\
                            <td>" + data[i]['apellidos'] +"</td>\
                            <td>" + data[i]['telefono'] +"</td>\
                            <td>" + data[i]['username'] +"</td>\
                            <td>" + data[i]['email'] + "</td>\
                            <td>" + estado + "</td>\
                            <td><a class='btn btn-outline-warning m-1'  href='editarusuario.php?id=" + id + "'" + " style='width: 80%; margin: auto;'>Editar</a>\
                            <a class='btn btn-outline-danger' onClick='eliminarusuario(" + id + ")'>Eliminar</a><td>";
                var item = $("<tr>").html(comments);
                list.append(item);
                }
                cont = cont + 5;
                let botonesInferiores = `
                    <a id="botonRegistrarUsuario" class="btn btn-outline-warning" href='registrarusuario.php'>registrar usuario</a>
                    <a class='btn btn-outline-primary btn-reply' onClick='listUsuarios("` + cont + `")'>Mas usuarios</a>
                `;
                
                $("#botonesInferiores").html(botonesInferiores)
                list.append(item);
                $("#listaDeUsuarios").html(list);
            }
        });
}

function eliminarusuario(id)
{
    $.ajax({
        url: "../../Controller/UsuariosController.php",
        data:  {'id':id, 'funcion':'eliminarUsuario'},
        type: 'post',
        success: function (response)
        {
            location.reload();
        }
    });
}
//COMENTARIOS
function listComments(pag) {
    var data = 'listarComentarios';
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

                
                var thead = "\
                              <thead>\
                                <tr>\
                                 <th>Nombre</th>\
                                 <th>Comentario</th>\
                                 <th>Fecha</th>\
                                 <th>Correo</th>\
                                 <th>Telefono</th>\
                                </tr>\
                             </thead>"
                var list = $("<table class='table contenido-tabla text-center text-white-50'>").html(thead);
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
                                <td>" + data[i]['date'] + "</td>\
                                <td>" + data[i]['correo'] + "</td>\
                                <td>" + data[i]['telefono'] + "</td>\
                                <td><a class='btn btn-outline-warning' onClick='aprobarcomment(" + id + ")'>Aprobar</a>\
                                <a class='btn btn-outline-danger' onClick='eliminarcomment(" + id + ")'>Eliminar</a><td>";
                    var item = $("<tr>").html(comments);
                    list.append(item);
                    
                }
                cont = cont + 5;
                var mas ="\<a class='btn btn-outline-primary btn-reply' onClick='listComment(" + cont + ")'>Mas comentarios</a>";
                var item = $("<tr>").html(mas);
                list.append(item);
                $("#listaDeComentarios").html(list);
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
    //console.log(str);
    var data = 'agregarComentario';
    $.ajax({
        url: "../../Controller/ComentariosUserController.php",
        data: str + '&funcion=' + data,
        type: 'post',
        success: function (response)
        {
            //console.log(response);
            $("#comment-message").css('display', 'inline-block');
            $("#name").val("");
            $("#telefono").val("");
            $("#correo").val("");
            $("#comment").val("");
            $("#commentId").val("");
            $("#comment").val("");
            $("#commentId").val("");
            listComment(5);
            toastr.success("Se ha enviado tu comentario")
           
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
        url: "../../Controller/ComentariosUserController.php",
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
                                <div class='comment-info text-white-50'>\
                                    <span class='commet-row-label'>De</span>\
                                    <span class='posted-by'>" + data[i]['comment_sender_name'] + "</span>\
                                    <span class='commet-row-label'>a las </span> \
                                    <span class='posted-at'>" + data[i]['date'] + "</span>\
                                </div>\
                                <div class='comment-text' style='color: #FFF;'>" + data[i]['comment'] + "</div>\
                                <div>\
                                    <a class='btn btn-outline-success btn-reply' onClick='postReply(" + commentId + ")'>Responder</a>\
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
                mas ="\<a class='btn btn-outline-primary btn-reply' onClick='listComment(" + cont + ")'>Mas comentarios</a>";
                var item = $("<li>").html(mas);
                list.append(item);
                $("#listaDeComentarios").html(list);
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

//BLOGS
function listblogimagen(pag)
{
    var blogs;
    var imagenes;
    var data = 'listarBlogs';
    $.ajax({
        url: "../../Controller/BlogsController.php",
        data: '&funcion=' + data,
        type: 'post',
        async: false,
        success: function (data) {
                blogs = JSON.parse(data);
            }
            });
    var data2 = 'listarImagenes';
    $.ajax({
        url: "../../Controller/BlogsController.php",
        data: '&funcion=' + data2,
        type: 'post',
        async: false,
        success: function (data) {
                imagenes = JSON.parse(data);
            }
            });

    this.listBlogs(pag, blogs, imagenes);
}
function listBlogs(pag, blogs, imagenes) {

    var comments = "";
    var item = "";
    var parent = -1;
        
    var thead = "\
        <thead>\
            <tr>\
                <th>titulo</th>\
                <th>descripcion</th>\
                <th>imagen</th>\
            </tr>\
        </thead>"
        var list = $("<table class='table contenido-tabla'>").html(thead);
        var item = $("<tr>").html(comments);

        var long = pag;
        var cont = pag;
        if(long > blogs.length)
        {
            long = blogs.length;

        }
        for (var i = 0; (i < long); i++)
        {   
            var id=blogs[i]['id']
            var td1 = `<td>` + blogs[i]['titulo'] +`</td>`;
            var td2 = `<td>` + blogs[i]['descripcion'] +`</td>`;
            var td3 = `<td>`;
            for (var j = 0; (j < imagenes.length); j++)
            {
                if(imagenes[j]['blog_id'] === id)
                {
                  
                    td3 += `<img src='` + imagenes[j]['imagen'] +`' width=100px height=100px>`
    
                }
            }  
            td3 +=`</td>`;
            var td4 = `<td><a onClick='eliminarBlog(` + id + `)'><button type='button' class='btn btn-warning'>Eliminar</button></a><td>`;
            comments = td1 + td2 + td3 + td4;

            var item = $("<tr>").html(comments);
            list.append(item);
                    
        }
        cont = cont + 5;
        var mas =`<a class='btn-reply' onClick='listblogimagen(` + cont + `)'>Mas blogs</a>`;
        var item = $("<tr>").html(mas);
        list.append(item);
        $("#output").html(list);
        
            
}
function eliminarBlog(id)
{
    $.ajax({
        url: "../../Controller/BlogsController.php", 
        data:  {'id':id, 'funcion':'eliminarBlog'},
        type: 'post',
        success: function (response)
        {
            //console.log(response)
            location.reload();
        }
    });
}
function subirImagenes() {
    var imagenes

    var form_data = new FormData()
    form_data.append('funcion','subirArchivos')
    form_data.append('titulo',document.getElementById("titulo").value)
    form_data.append('descripcion',document.getElementById("descripcion").value)
    // Recibimos los archivos y los añadimos al form_data
    var totalfiles = document.getElementById("file").files.length;
    for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('file').files[index])
    }
    $.ajax({
        url: "../../Controller/BlogsController.php", 
        type: 'post',
        async: false,
        data: form_data,
        contentType: false,
        processData: false,
        success: function (response) {
        //console.log(response)
        imagenes = response
        window.location.href = 'listablogs.php';
}});
}
function listblogusuario(pag)
{
    var blogs;
    var imagenes;
    var data = 'listarBlogs';
    $.ajax({
        url: "../../Controller/BlogsUserController.php",
        data: '&funcion=' + data,
        type: 'post',
        async: false,
        success: function (data) {
                blogs = JSON.parse(data);
            }
            });
    var data2 = 'listarImagenes';
    $.ajax({
        url: "../../Controller/BlogsUserController.php",
        data: '&funcion=' + data2,
        type: 'post',
        async: false,
        success: function (data) {
                imagenes = JSON.parse(data);
            }
            });

    this.listBlogsusuarios(pag, blogs, imagenes);
}
function listBlogsusuarios(pag, blogs, imagenes) {

    var comments = "";
    var item = "";
    var parent = -1;
        
    var thead = ``;
        var list = $("<div>").html(thead);

        var long = pag;
        var cont = pag;
        if(long > blogs.length)
        {
            long = blogs.length;

        }
        for (var i = 0; (i < long); i++)
        {   
            var ind = i+1;
            var id=blogs[i]['id']
            var blog = `<h1>Blog No ` + ind  +`</h1>`
            var titulo = `<h1>` + blogs[i]['titulo'] +`</h1>`;
            var des= blogs[i]['descripcion'].replace(/\r?\n/g, '<br />');
            var descripcion = `<p>` + des +`</p>`;
            
            var image = "";
            for (var j = 0; (j < imagenes.length); j++)
            {
                if(imagenes[j]['blog_id'] === id)
                {
                  
                    image += `<img src='` + imagenes[j]['imagen'] +`' width=100px height=100px>`
    
                }
            }  
            
            comments = blog + titulo + image + descripcion ;
            list.append(comments);
                    
        }
        cont = cont + 5;
        var mas =`<a class='btn-reply' onClick='listblogusuarios(` + cont + `)'>Mas blogs</a>`;
        var item = $("<p>").html(mas);
        list.append(item);
        $("#output").html(list);
        
            
}

//ROLES
function listRoles(pag) {
    var data = 'listarRoles';
    $.ajax({
        url: "../../Controller/RolesController.php",
        data: '&funcion=' + data,
        type: 'post',
        success: function (data) {
                var data = JSON.parse(data);

                var comments = "";
                var item = "";
                var parent = -1;

                
                var thead = "\
                              <thead>\
                                <tr>\
                                 <th>id</th>\
                                 <th>Rol</th>\
                                </tr>\
                             </thead>"
                var list = $("<table class='table table-hover contenido-tabla text-center text-white-50'>").html(thead);
                var item = $("<tr>").html(comments);

                var long = pag;
                var cont = pag;
                if(long > data.length)
                {
                    long = data.length;

                }
                for (var i = 0; (i < long); i++)
                {   
                var id=data[i]['id']
                comments = "\
                            <td>" + data[i]['id'] +"</td>\
                            <td>" + data[i]['name'] + "</td>\
                            <td><a class='btn btn-outline-warning m-1'  href='editarrol.php?id=" + id + "'" + " style='width: 80%; margin: auto;'>Editar</a><td>";
                var item = $("<tr>").html(comments);
                list.append(item);
                }
                cont = cont + 5;
                let botonesInferiores = `
                    <a id="botonRegistrarUsuario" class="btn btn-outline-warning" href='registrarrol.php'>registrar rol</a>
                    <a class='btn btn-outline-primary btn-reply' onClick='listRoles("` + cont + `")'>Mas roles</a>
                `;
                
                $("#botonesInferiores").html(botonesInferiores)
                list.append(item);
                $("#listaDeUsuarios").html(list);
            }
        });
}

function registrarRol() {

    var form_data = new FormData()
    form_data.append('funcion','agregarRol')
    form_data.append('rol',document.getElementById("rol").value)
    var fld = document.getElementById('permisos');
    var values = [];
    for (var i = 0; i < fld.options.length; i++) {
      if (fld.options[i].selected) {
        values.push(fld.options[i].value);
        //console.log(values)
      }
    }
    form_data.append("permisos[]", values)
    for (var value of form_data.values()) {
        //console.log(value);
     }
    
    $.ajax({
        url: "../../Controller/RolesController.php", 
        type: 'post',
        async: false,
        data: form_data,
        contentType: false,
        processData: false,
        success: function (response) {
        //console.log(response)
        imagenes = response
        window.location.href = 'listaderoles.php';
}});
}
function actualizarRol() {

    var form_data = new FormData()
    form_data.append('funcion','actualizarRol')
    form_data.append('id',document.getElementById("id").value)
    form_data.append('rol',document.getElementById("rol").value)
    var fld = document.getElementById('permisos');
    var values = [];
    for (var i = 0; i < fld.options.length; i++) {
      if (fld.options[i].selected) {
        values.push(fld.options[i].value);
        //console.log(values)
      }
    }
    form_data.append("permisos[]", values)

    
    $.ajax({
        url: "../../Controller/RolesController.php", 
        type: 'post',
        async: false,
        data: form_data,
        contentType: false,
        processData: false,
        success: function (response) {
        //console.log(response)
        imagenes = response
        window.location.href = 'listaderoles.php';
}});
}

//EQUIPO
function registrarEquipo(){
    $("#comment-message").css('display', 'none');
    var str = $("#frm-comment").serialize();
    //console.log(str);
    var form_data = new FormData();
    form_data.append('funcion','agregarEquipo')
    form_data.append('nombre',document.getElementById("nombre").value)
    form_data.append('cargo',document.getElementById("cargo").value)
    form_data.append('funcione',document.getElementById("funcione").value)
    form_data.append('resumen',document.getElementById("resumen").value)
    form_data.append('correo',document.getElementById("correo").value)
    form_data.append('biografia',document.getElementById("biografia").value)
    form_data.append('instagram',document.getElementById("instagram").value)
    form_data.append('facebook',document.getElementById("facebook").value)
    form_data.append('tiktok',document.getElementById("tiktok").value)
    form_data.append('linkedin',document.getElementById("linkedin").value)
    var totalfiles = document.getElementById("file").files.length;
    for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('file').files[index]);
    }
    for (var value of form_data.values()) {
        console.log(value);
     }
    $.ajax({
        url: "../../Controller/EquipoController.php",
        data: form_data,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (response)
        {

            window.location.href = 'listaequipo.php';
           
        }
    });
}

function listarEquipo(pag) {
    var data = 'listarEquipo';
    //console.log("entra en listarUsuario")
    $.ajax({
        url: "../../Controller/EquipoController.php",
        data: '&funcion=' + data,
        type: 'post',
        success: function (data) {
                var data = JSON.parse(data);

                var comments = "";
                var item = "";
                var parent = -1;

                
                var thead = "\
                                <thead>\
                                <tr>\
                                    <th>Foto</th>\
                                    <th>Nombre</th>\
                                    <th>Cargo</th>\
                                    <th>Funcion</th>\
                                    <th>Resumen</th>\
                                    <th>Biografia</th>\
                                    <th>Correo</th>\
                                    <th>Instagram</th>\
                                    <th>Facebook</th>\
                                    <th>Tiktok</th>\
                                    <th>Linkedin</th>\
                                    <th>Acción</th>\
                                </tr>\
                                </thead>"
                var list = $("<table class='table table-hover contenido-tabla text-center text-white-50'>").html(thead);
                var item = $("<tr>").html(comments);

                var long = pag;
                var cont = pag;
                if(long > data.length)
                {
                    long = data.length;

                }
                for (var i = 0; (i < long); i++)
                {   
                var id=data[i]['id']
                comments = "\
                            <td><img src='" + data[i]['imagen'] +"' width=100px height=100px></td>\
                            <td>" + data[i]['nombre'] +"</td>\
                            <td>" + data[i]['cargo'] +"</td>\
                            <td>" + data[i]['funcion'] +"</td>\
                            <td style='height: 200px important!; overflow-y: scroll;' >" + data[i]['resumen'] +"</td>\
                            <td style='height: 200px important!; overflow-y: scroll;' >" + data[i]['biografia'] + "</td>\
                            <td>" + data[i]['correo'] + "</td>\
                            <td>" + data[i]['instagram'] + "</td>\
                            <td>" + data[i]['facebook'] + "</td>\
                            <td>" + data[i]['tiktok'] + "</td>\
                            <td>" + data[i]['linkedin'] + "</td>\
                            <td><a class='btn btn-outline-warning m-1'  href='editarequipo.php?id=" + id + "'" + " style='width: 80%; margin: auto;'>Editar</a>\
                            <a class='btn btn-outline-danger' onClick='eliminarequipo(" + id + ")'>Eliminar</a><td>";
                var item = $("<tr>").html(comments);
                list.append(item);
                }
                cont = cont + 5;
                let botonesInferiores = `
                    <a id="botonRegistrarUsuario" class="btn btn-outline-warning" href='registrarequipo.php'>registrar perfil de equipo</a>
                    <a class='btn btn-outline-primary btn-reply' onClick='listarEquipo("` + cont + `")'>Mas Perfiles de equipo</a>
                `;
                
                $("#botonesInferiores").html(botonesInferiores)
                list.append(item);
                $("#listaDeUsuarios").html(list);
            }
        });
}

function eliminarequipo(id)
{
    $.ajax({
        url: "../../Controller/EquipoController.php", 
        data:  {'id':id, 'funcion':'eliminarEquipo'},
        type: 'post',
        success: function (response)
        {
            //console.log(response)
            location.reload();
        }
    });
}

function actualizarEquipo(){
    $("#comment-message").css('display', 'none');
    var str = $("#frm-comment").serialize();
    //console.log(str);
    var form_data = new FormData();
    form_data.append('funcion','actualizarEquipo')
    form_data.append('nombre',document.getElementById("nombre").value)
    form_data.append('cargo',document.getElementById("cargo").value)
    form_data.append('funcione',document.getElementById("funcione").value)
    form_data.append('resumen',document.getElementById("resumen").value)
    form_data.append('correo',document.getElementById("correo").value)
    form_data.append('biografia',document.getElementById("biografia").value)
    form_data.append('instagram',document.getElementById("instagram").value)
    form_data.append('facebook',document.getElementById("facebook").value)
    form_data.append('tiktok',document.getElementById("tiktok").value)
    form_data.append('linkedin',document.getElementById("linkedin").value)
    var totalfiles = document.getElementById("file").files.length;

    for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('file').files[index]);
    }
    

    $.ajax({
        url: "../../Controller/EquipoController.php",
        data: form_data,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (response)
        {

            window.location.href = 'listaequipo.php';
           
        }
    });
}