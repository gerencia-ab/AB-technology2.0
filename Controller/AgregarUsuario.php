<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

require_once ("Conexion.php");
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

?>