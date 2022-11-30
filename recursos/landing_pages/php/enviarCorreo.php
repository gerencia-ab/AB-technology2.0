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
                    $userName = 'veterinary@ab-sistemas.com';
                    $passwrod = '@97$SO6Es*D!';
                    $from = 'veterinary@ab-sistemas.com';
                    $subject = 'Nuevo suscriptor en veterinaryApp';
                    $title = 'INFORMACIÓN DE NUEVO SUSCRIPTOR EN VETERINARY APP';
                }else if($ind == 2){
                    $userName = 'envios@ab-sistemas.com';
                    $passwrod = '&^AC@22&461^';
                    $from = 'envios@ab-sistemas.com';
                    $subject = utf8_decode('Nuevo suscriptor en SISTEMA DE CONTROL DE ENVÍOS');
                    $title = 'INFORMACIÓN DE NUEVO SUSCRIPTOR EN CONTROL DE ENVÍOS';
                }else if($ind == 3){
                    $userName = 'serviteca@ab-sistemas.com';
                    $passwrod = 'Lu1V60Ur0&^9';
                    $from = 'serviteca@ab-sistemas.com';
                    $subject = utf8_decode('Nuevo suscriptor en serviteca');
                    $title = 'INFORMACIÓN DE NUEVO SUSCRIPTOR EN SERVITECA';
                }else if($ind == 4){
                    $userName = 'calzado@ab-sistemas.com';
                    $passwrod = 'We0!%DQI0J2Z';
                    $from = 'calzado@ab-sistemas.com';
                    $subject = utf8_decode('Nuevo suscriptor en calzado y marroquinería');
                    $title = 'INFORMACIÓN DE NUEVO SUSCRIPTOR EN SIP CALZADO - MARROQUINERÍA';
                }else if($ind == 5){
                    $userName = 'sip@ab-sistemas.com';
                    $passwrod = '5*84GIp%Pl%m';
                    $from = 'sip@ab-sistemas.com';
                    $subject = utf8_decode('Nuevo suscriptor en sip droguería');
                    $title = 'INFORMACIÓN DE NUEVO SUSCRIPTOR EN SIP DROGUERÍA';
                }
    
                $mensajeCompleto = "
                    <div style='background-color: #F0FDFA; padding: 0px 15px;'>
                        <div style='height: 100%; width: 100%;'>
                            <div style='text-align: center; padding-top: 12px;'>
                                <h1 style=font-weight:bold; color: #0D9488; font-size: 3rem;'>
                                ".utf8_decode($title)."
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