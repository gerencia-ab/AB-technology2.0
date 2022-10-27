var soloNumeros = (event) => {
    var code = (event.which) ? event.which : event.keyCode;
    if (code == 8) {
        return true;
    } else if (code >= 48 && code <= 57) {
        return true;
    } else {
        return false;
    }
}

var enviarSuscripcion = (ind) => {
    let nombre = document.getElementById("nombre").value
    let telefono = document.getElementById("telefono").value
    let correo = document.getElementById("correo").value
    let recaptchaResponse = document.getElementById("recaptchaResponse").value
    let regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if (nombre != '' && telefono != '' && correo != '') {
        if (!regex.test(correo)) {
            Swal.fire(
                'Oops!',
                'Correo no válido',
                'warning'
            )
        } else {
            $.ajax({
                type: "POST",
                url: "../../../../recursos/landing_pages/php/enviarCorreo.php",
                data: {
                    "funcion": "enviarSuscripcion",
                    "nombre": nombre,
                    "telefono": telefono,
                    "ind": ind,
                    "correo": correo,
                    "recaptchaResponse": recaptchaResponse
                },
                success: function (response) {
                    console.log(response)
                    let res = JSON.parse(response)
                    if (res.respuesta) {
                        document.getElementById("nombre").value = ''
                        document.getElementById("telefono").value = ''
                        document.getElementById("correo").value = ''
                        
                        if(ind == 1){
                            Swal.fire({
                                title: 'Suscripción exitosa!',
                                text: 'Tus datos han sido enviados',
                                imageUrl: 'https://images.unsplash.com/photo-1502673530728-f79b4cab31b1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                                imageWidth: 400,
                                imageHeight: 260,
                                imageAlt: 'Gracias por suscribirte en veterinaryApp',
                            })
                        }else if(ind == 2){
                            Swal.fire({
                                title: 'Suscripción exitosa!',
                                text: 'Tus datos han sido enviados',
                                imageUrl: 'https://images.unsplash.com/photo-1592805144716-feeccccef5ac?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80',
                                imageWidth: 400,
                                imageHeight: 260,
                                imageAlt: 'Gracias por suscribirte en nuestro SISTEMA DE CONTROL DE ENVÍOS',
                            })
                        }else{
                            console.log('indice diferente: '+ind)
                        }
                    } else {
                        Swal.fire(
                            'Error!',
                            'Ha ocurrido un error, por favor vuelve a intentar!',
                            'error'
                        )
                    }
                }
            });
        }
    } else {
        Swal.fire(
            'Oops!',
            'Debes ingresar todos los datos para realizar una suscripción exitosa',
            'warning'
        )
    }
}