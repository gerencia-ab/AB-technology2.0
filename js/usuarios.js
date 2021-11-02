$(document).ready(function () {
    listComment(5);
});

function listComment(pag) {
    $.post("Controller/ListarUsuario.php",
            function (data) {
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
                var mas ="\<a class='btn-reply' onClick='listComment(" + cont + ")'>Mas usuarios</a>";
                var item = $("<tr>").html(mas);
                list.append(item);
                $("#output").html(list);
            });
}