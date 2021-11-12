<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

include "Conexion.php";

class UsuariosController {

function agregarUsuario($conn){
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $email = isset($_POST['correo']) ? $_POST['correo'] : "";
    $rol = isset($_POST['rol']) ? $_POST['rol'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $hash = password_hash($password, PASSWORD_DEFAULT, [15]);
    $Estado = "yes";

    $sql = "INSERT INTO members(username,email,password,rol,active) VALUES (:username, :email, :password, :rol, :active)";

    $statement = $conn->prepare($sql);
    $statement->execute(array(
    	'username' => $username, 
        'email' => $email, 
        'password' => $hash, 
        'rol' => $rol, 
        'active' => $Estado
    ));
    return $statement;
}

function actualizarUsuario($conn){
    $id = $_POST["id"];
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $email = isset($_POST['correo']) ? $_POST['correo'] : "";
    $rol = isset($_POST['rol']) ? $_POST['rol'] : "";
    
    $sentencia = $conn->prepare("UPDATE members SET username = ?, email = ?, rol = ? WHERE memberID = ?;");
    $resultado = $sentencia->execute([$username, $email, $rol, $id]);
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
    $user = new UsuariosController();
    switch ($funcion) {
        case 'agregarUsuario':
            $user->agregarUsuario($conn);
            break;
        case 'actualizarUsuario':
            $user->actualizarUsuario($conn);
            break;
        case 'listarUsuario':
            $user->listarUsuario($conn);
            break;
        default:
            # code...
            break;
    }
}
?>