
function contactar() {
    
    const nombre = document.getElementById('inputNombre').value
    const telefono = document.getElementById('inputTelefono').value
    const email = document.getElementById('inputEmail').value
    const mensaje = document.getElementById('textMensaje').value
    var data = new FormData()
    data.append('nombre', nombre)
    data.append('telefono', telefono)
    data.append('email', email)
    data.append('mensaje', mensaje)
    data.append('funcion', 'enviarCorreo')
    $.ajax({
        url: "http://localhost/AB-technology2.0/Controller/Mail.php",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: (response) => {
            console.log(response)
        }
    });
}

function enviarRequerimientos() {
    //Datos Formulario de requerimientos
    var data = new FormData()
    //Primer slide
    data.append('nombre', document.getElementById('nombre').value)
    data.append('email', document.getElementById('email').value)
    data.append('celular', document.getElementById('celular').value)
    //Segundo slide
    var servicios = [document.getElementById('cbPaginaWeb'), document.getElementById('cbApp'), document.getElementById('cbAdministracion'), document.getElementById('cbMantenimiento'), document.getElementById('cbTiendaOnline'), document.getElementById('cbAplicacionMedida')]
    var arrayServicios = []
    
    servicios.forEach((cb, i) =>{
        if (cb.checked) {
            arrayServicios.push(servicios[i].value)
        }
    })
    data.append('servicios', arrayServicios)
    //Tercer slide
    data.append('nombreEmprendimiento', document.getElementById('nombreEmprendimiento').value)
    data.append('meta', document.getElementById('meta').value)
    data.append('funcion', 'enviarRequerimientos')
    $.ajax({
        url: "http://localhost/AB-technology2.0/Controller/Mail.php",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: (response) => {
            console.log(response)
        }
    });
    
 }

