<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

include "Conexion.php";
    if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }else if(!($user->rol($_SESSION['username'])=="Admin"))
    {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
    }
class UsuariosController {

function agregarUsuario($conn){
    try{
       
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
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
        $email = isset($_POST['correo']) ? $_POST['correo'] : "";
        $rol = isset($_POST['rol']) ? $_POST['rol'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        $hash = password_hash($password, PASSWORD_DEFAULT, [15]);
        $Estado = "yes";

        $sql = "INSERT INTO members(username,email,password,rol,active,nombres,apellidos,telefono,imagen) VALUES (:username, :email, :password, :rol, :active, :nombres, :apellidos, :telefono, :imagen)";

        $statement = $conn->prepare($sql);
        $statement->execute(array(
            'username' => $username, 
            'email' => $email, 
            'password' => $hash, 
            'rol' => $rol, 
            'active' => $Estado,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'telefono' => $telefono,
            'imagen' => $path2
        ));
        
        
        return $statement;

        
    }catch(Exception $e){
        echo 'error: '.$e->getMessage();
    }
    
}

function eliminarUsuario($conn){
    $id = $_POST["id"];
    $path = "/opt/lampp/htdocs";
    $stmt_select = $conn->prepare('SELECT imagen FROM members WHERE memberID =:uid');
    $stmt_select->execute(array(':uid'=>$id));
    $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink($path.$imgRow['imagen']);
    $sentencia = $conn->prepare("DELETE FROM members WHERE memberID = ?;");
    $resultado = $sentencia->execute([$id]);
}

function actualizarUsuario($conn){
    $id = $_POST["id"];
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $email = isset($_POST['correo']) ? $_POST['correo'] : "";
    $rol = isset($_POST['rol']) ? $_POST['rol'] : "";
    $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
    $sentencia = $conn->prepare("UPDATE members SET username = ?, email = ?, rol = ?, nombres = ?, apellidos = ?, telefono = ? WHERE memberID = ?;");
    $resultado = $sentencia->execute([$username, $email, $rol, $nombres, $apellidos, $telefono, $id]);
    return $resultado;
}

function actualizarPerfil($conn, $id){
    
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $email = isset($_POST['correo']) ? $_POST['correo'] : "";
    $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
    $sentencia = $conn->prepare("UPDATE members SET username = ?, email = ?, nombres = ?, apellidos = ?, telefono = ? WHERE memberID = ?;");
    $resultado = $sentencia->execute([$username, $email, $nombres, $apellidos, $telefono, $id]);
    return $resultado;
}

function listarUsuario($conn){
    $sql= "SELECT members.* FROM members";
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
    $usuarios = new UsuariosController();
    $id = $user->id($_SESSION['username']);
    switch ($funcion) {
        case 'agregarUsuario':
            $usuarios->agregarUsuario($conn);
            break;
        case 'actualizarUsuario':
            $usuarios->actualizarUsuario($conn);
            break;
        case 'actualizarPerfil':
            $usuarios->actualizarPerfil($conn, $id);
            break;
        case 'listarUsuario':
            $usuarios->listarUsuario($conn);
            break;
        case 'eliminarUsuario':
            $usuarios->eliminarUsuario($conn);
            break;
        default:
            # code...
            break;
    }
}
?>