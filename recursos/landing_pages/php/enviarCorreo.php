<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

class metodos
{
    public function __construct()
    {
    }
    
    function enviarInfoSuscriptor($nombre, $telefono, $ind, $correo, $recaptcha_response){

        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
        $recaptcha_secret = '6LdYQawiAAAAABa_AheZr3bqJG11GsJ8Fu0BKpus';
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
        $recaptcha = json_decode($recaptcha); 
        
        if($recaptcha->score >= 0.7){        
            try {
                $mail = new PHPMailer(true);
    
                if($ind == 1){
                    $mensajeCompleto = "
                        <div style='background-color: #F0FDFA; padding: 0px 15px;'>
                            <div style='height: 100%; width: 100%;'>
                                <div'>
                                    <img src='https://clientes.ab-sistemas.com/veterinaryapp/Resource/imagenes/encabezado_correo.jpg' alt='Encabezado del correo' style='object-fit: cover; height: 160px; width: 100%; border-bottom: solid 2px #0D9488;'>
                                </div>
                                <div style='text-align: center;'>
                                    <h1 style=font-weight:bold; color: #0D9488; font-size: 3rem;'>
                                    ".utf8_decode('INFORMACIÓN REGISTRADA DEL SUSCRIPTOR')."
                                    </h1>
                                </div>
                                <div style='padding: 20px; margin-top: 10px;'>
                                    <p style='color: #0D9488; font-size: 1rem;'><strong>Nombre: ".utf8_decode($nombre)."</strong> </p>
                                    <p style='color: #0D9488; font-size: 1rem;'><strong>".utf8_decode('Teléfono').": ".utf8_decode($telefono)."</strong> </p>
                                    <p style='color: #0D9488; font-size: 1rem;'><strong>Correo: ".utf8_decode($correo)."</strong> </p>
                                </div>
                            </div>
                        </div>
                    ";
                }else if($ind == 2){
                    $mensajeCompleto = "
                        <div style='background-color: #A0C3FF; padding: 0px 15px;'>
                            <div style='height: 100%; width: 100%;'>
                                <div'>
                                    <img src='https://images.unsplash.com/photo-1592805144716-feeccccef5ac?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80' alt='Encabezado del correo' style='object-fit: cover; height: 160px; width: 100%; border-bottom: solid 2px #0D9488;'>
                                </div>
                                <div style='text-align: center;'>
                                    <h1 style=font-weight:bold; color: #00000 !important; font-size: 3rem;'>
                                    ".utf8_decode('INFORMACIÓN REGISTRADA DEL SUSCRIPTOR')."
                                    </h1>
                                </div>
                                <div style='padding: 20px; margin-top: 10px;'>
                                    <p style='color: #000000; font-size: 1rem;'><strong>Nombre: ".utf8_decode($nombre)."</strong> </p>
                                    <p style='color: #000000; font-size: 1rem;'><strong>".utf8_decode('Teléfono').": ".utf8_decode($telefono)."</strong> </p>
                                    <p style='color: #000000; font-size: 1rem;'><strong style='text-decoration: none;'>Correo: ".utf8_decode($correo)."</strong> </p>
                                </div>
                            </div>
                        </div>
                    ";
                }else{
                    
                }
                try {
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true,
                        ),
                    );
                    // Configuracion SMTP
                    $mail->SMTPDebug = 0; // Mostrar salida (Desactivar en producción)
                    $mail->isSMTP(); // Activar envio SMTP
                    $mail->Host = 'send.one.com'; // Servidor SMTP
                    $mail->SMTPAuth = true;
                    // Identificacion SMTP
                    
                    if($ind == 1){
                        $userName = 'veterinary@ab-sistemas.com';
                        $passwrod = '@97$SO6Es*D!';
                        $from = 'veterinary@ab-sistemas.com';
                        $subject = 'Nuevo suscriptor en veterinaryApp';
                    }else if($ind == 2){
                        $userName = 'envios@ab-sistemas.com';
                        $passwrod = '&^AC@22&461^';
                        $from = 'envios@ab-sistemas.com';
                        $subject = utf8_decode('Nuevo suscriptor en SISTEMA DE CONTROL DE ENVÍOS');
                    }else{
                        $userName = 'envios@ab-sistemas.com';
                        $passwrod = '&^AC@22&461^';
                        $from = 'envios@ab-sistemas.com';
                        $subject = 'Nuevo suscriptor en SISTEMA DE CONTROL DE ENVÍOS';
                    }
                    $mail->Username = $userName; // Usuario SMTP
                    $mail->Password = $passwrod;
                    $mail->SMTPSecure = "tls";
                    $mail->Port = 587;
                    $mail->setFrom($from,  utf8_decode('Atención al cliente'));
                    $mail->addAddress('gerencia@ab-sistemas.com',  utf8_decode('Administración'));
    
                    // Contenido del correo
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $mensajeCompleto;
                    $mail->AltBody = $mensajeCompleto;
                    $result = $mail->send();
    
                    echo json_encode(["respuesta" => $result]);
                } catch (Exception $e) {
                    echo json_encode(["respuesta" => $e->getMessage()]);
                }
            } catch (\Exception $e) {
                echo json_encode(["respuesta" => $e->getMessage()]);
            }
        } else {
            echo json_encode(["respuesta" => "Error en el envío"]);
        }
    }
}

if (isset($_POST["funcion"])) {
    $m = new metodos();
    
    switch ($_POST["funcion"]) {
        case 'enviarSuscripcion':
            $m->enviarInfoSuscriptor($_POST["nombre"], $_POST["telefono"], $_POST["ind"], $_POST["correo"], $_POST["recaptchaResponse"]);
            break;        
        default:
            echo 'error';
            break;
    }
}