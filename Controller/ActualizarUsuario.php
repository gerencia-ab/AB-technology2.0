<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);

require_once ("Conexion.php");
$id = $_POST["id"];
$username = isset($_POST['username']) ? $_POST['username'] : "";
$email = isset($_POST['correo']) ? $_POST['correo'] : "";
$rol = isset($_POST['rol']) ? $_POST['rol'] : "";

$sentencia = $conn->prepare("UPDATE members SET username = ?, email = ?, rol = ? WHERE memberID = ?;");
$resultado = $sentencia->execute([$username, $email, $rol, $id]);
return $resultado;
?>
