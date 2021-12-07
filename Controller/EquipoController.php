<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

include "Conexion.php";
    if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }
class EquipoController {

function agregarEquipo($conn, $user){
    if(!($user->permisoregistrar($_SESSION['username'])==2))
    {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
    }
    
       
        $path = "/opt/lampp/htdocs/AB-technology/recursos/imagenes/";
       
        
        $countfiles = count($_FILES['files']['name']);
        $upload_location = "/opt/lampp/htdocs/AB-technology/recursos/imagenes/";
        $path2 = "/AB-technology/recursos/imagenes/";
        $files_arr = array();
        for($index = 0;$index < $countfiles;$index++){
            if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                //$name = basename($_FILES["pictures"]["name"][$key]);
                $filename = basename($_FILES['files']['name'][$index]);
                $ext = strtolower(pathinfo($_FILES['files']['name'][$index], PATHINFO_EXTENSION));
                $valid_ext = array("png","jpeg","jpg");
                if(in_array($ext, $valid_ext)){
                    $path = $upload_location.$filename;
                    $path2 = $path2.$filename;
                    if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                        
                        $files_arr[] = $path;
                        
                    }
                }
            }
        }
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
        $funcione = isset($_POST['funcione']) ? $_POST['funcione'] : "";
        $resumen = isset($_POST['resumen']) ? $_POST['resumen'] : "";
        $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
        $biografia = isset($_POST['biografia']) ? $_POST['biografia'] : "";
        $instagram = isset($_POST['instagram']) ? $_POST['instagram'] : "";
        $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : "";
        $tiktok = isset($_POST['tiktok']) ? $_POST['tiktok'] : "";
        $linkedin = isset($_POST['linkedin']) ? $_POST['linkedin'] : "";
        if($instagram == "")
        {
            $instagram = "notiene";
        }
        if($linkedin == "")
        {
            $linkedin = "notiene";
        }
        if($facebook == "")
        {
            $facebook = "notiene";
        }
        if($tiktok== "")
        {
            $tiktok = "notiene";
        }

        $sql = "INSERT INTO equipo(nombre,cargo,funcion,resumen,biografia,instagram,facebook,tiktok,linkedin,imagen,correo) VALUES (:nombre, :cargo, :funcion, :resumen, :biografia, :instagram, :facebook, :tiktok, :linkedin, :imagen, :correo)";

        $statement = $conn->prepare($sql);
        $statement->execute(array(
            'nombre' => $nombre, 
            'cargo' => $cargo, 
            'funcion' => $funcione, 
            'resumen' => $resumen, 
            'biografia' => $biografia,
            'instagram' => $instagram,
            'facebook' => $facebook,
            'tiktok' => $tiktok,
            'linkedin' => $linkedin,
            'imagen' => $path2,
            'correo' => $correo
        ));
        
        
        return $statement;

        
    
    
}

function eliminarEquipo($conn, $user){
    if(!($user->permisoeliminar($_SESSION['username'])==4))
    {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
    }
    $id = $_POST["id"];
    $path = "/opt/lampp/htdocs";
    $stmt_select = $conn->prepare('SELECT imagen FROM equipo WHERE id =:uid');
    $stmt_select->execute(array(':uid'=>$id));
    $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink($path.$imgRow['imagen']);
    $sentencia = $conn->prepare("DELETE FROM equipo WHERE id = ?;");
    $resultado = $sentencia->execute([$id]);
}

function actualizarEquipo($conn, $user){
    if(!($user->permisomodificar($_SESSION['username'])==3))
    {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
    }
    $path = "/opt/lampp/htdocs/AB-technology/recursos/imagenes/";
       
        
    $countfiles = count($_FILES['files']['name']);
    $upload_location = "/opt/lampp/htdocs/AB-technology/recursos/imagenes/";
    $path2 = "/AB-technology/recursos/imagenes/";
    $files_arr = array();
    for($index = 0;$index < $countfiles;$index++){
        if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
            //$name = basename($_FILES["pictures"]["name"][$key]);
            $filename = basename($_FILES['files']['name'][$index]);
            $ext = strtolower(pathinfo($_FILES['files']['name'][$index], PATHINFO_EXTENSION));
            $valid_ext = array("png","jpeg","jpg");
            if(in_array($ext, $valid_ext)){
                $path = $upload_location.$filename;
                $path2 = $path2.$filename;
                if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                    
                    $files_arr[] = $path;
                    
                }
            }
        }
    }
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
    $funcione = isset($_POST['funcione']) ? $_POST['funcione'] : "";
    $resumen = isset($_POST['resumen']) ? $_POST['resumen'] : "";
    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
    $biografia = isset($_POST['biografia']) ? $_POST['biografia'] : "";
    $instagram = isset($_POST['instagram']) ? $_POST['instagram'] : "";
    $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : "";
    $tiktok = isset($_POST['tiktok']) ? $_POST['tiktok'] : "";
    $linkedin = isset($_POST['linkedin']) ? $_POST['linkedin'] : "";
    if($instagram == "")
    {
        $instagram = "notiene";
    }
    if($linkedin == "")
    {
        $linkedin = "notiene";
    }
    if($facebook == "")
    {
        $facebook = "notiene";
    }
    if($tiktok== "")
    {
        $tiktok = "notiene";
    }
    $sentencia = $conn->prepare("UPDATE equipo SET nombre = ?, cargo = ?, funcion = ?, resumen = ?, biografia = ?, correo = ?, instagram = ?, facebook = ?, tiktok = ?, linkedin = ?, imagen = ? WHERE id = ?;");
    $resultado = $sentencia->execute([$nombre, $cargo, $funcione, $resumen, $biografia, $correo, $instagram, $facebook, $tiktok, $linkedin, $path2, $id]);
    return $resultado;
}

function listarEquipo($conn, $user){
    if(!($user->permisoleer($_SESSION['username'])==1))
    {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
    }
    $sql= "SELECT equipo.* FROM equipo";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $record_set = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($record_set, $row);
    }
    
    echo json_encode($record_set);
}
}
if(isset($_POST['funcion'])){
    $funcion = $_POST['funcion'];
    $usuarios = new EquipoController();
    $id = $user->id($_SESSION['username']);
    switch ($funcion) {
        case 'agregarEquipo':
            $usuarios->agregarEquipo($conn, $user);
            break;
        case 'actualizarEquipo':
            $usuarios->actualizarEquipo($conn, $user);
            break;
        case 'listarEquipo':
            $usuarios->listarEquipo($conn, $user);
            break;
        case 'eliminarEquipo':
            $usuarios->eliminarEquipo($conn, $user);
            break;
        default:
            # code...
            break;
    }
}
?>