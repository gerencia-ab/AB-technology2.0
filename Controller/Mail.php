<?php
class gestorEnvios{
    public function enviarCorreo(){
        $destino = "gerencia@ab-sistemas.com, jcastro@ab-sistemas.com";
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];
        $cuerpo_del_mensaje = $_POST["mensaje"];
        $contenidomsn = "nombre: " . $nombre . "\nCorreo: " . $email . "\nTelefono: " . $telefono . "\nMensaje: " . $cuerpo_del_mensaje;
        $cabeceras = 'De: '.$email.'' . "\r\n";
        
        try {
            if(mail($destino, "Un usuario te envio un mensaje", $contenidomsn, $cabeceras)){
                $rtaMensaje = "Mensaje enviado";
            }else{
                $rtaMensaje = "Error";
            }
            echo $rtaMensaje;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function enviarRequerimientos(){
        $destino = "gerencia@ab-sistemas.com, jcastro@ab-sistemas.com, hrondon@ab-sistemas.com";
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];

        $servicios = explode(',',$_POST["servicios"]);
        $arrayServicios = array();

        $cuerpo_del_mensaje = "Los servicios que solicito son los siguientes: \n\n";
        $indice = 0;
        foreach ($servicios as $value) {
            $indice++;
            $cuerpo_del_mensaje = $cuerpo_del_mensaje.$indice.' '.$value."\n";
        }
        $nombreEmprendimiento = $_POST["nombreEmprendimiento"];
        $meta = $_POST["meta"];

        
        $contenidomsn = "nombre: " . $nombre . "\nCorreo: " . $email . "\nCelular: " . $celular . "\nMensaje: " . $cuerpo_del_mensaje;
        $cabeceras = 'De: '.$email.'' . "\r\n";
        
        try {
            if(mail($destino, "Nueva cotización", $contenidomsn, $cabeceras)){
                $rtaMensaje = "Mensaje enviado";
            }else{
                $rtaMensaje = "Error";
            }
            echo $rtaMensaje;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
}
    
    if (isset($_POST['funcion'])) {
        $gestorEnvios = new gestorEnvios;
        
        switch ($_POST['funcion']) {
            case 'enviarCorreo':
                $gestorEnvios->enviarCorreo();
                break;
            case 'enviarRequerimientos':
                $gestorEnvios->enviarRequerimientos();
                break;
            default:
                # code...
                break;
        }
    }
    
?>