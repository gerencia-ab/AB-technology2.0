<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);

require_once ("Conexion.php");
if(!$user->is_logged_in())
{ 
    header('Location: ../login.php'); 
    exit(); 
}else if(!($user->rol($_SESSION['username'])=="Admin"))
{
    header('Location: ../memberpage.php'); 
    exit(); 
}else if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
$estado = 1;


$sentencia = $conn->prepare("UPDATE comentario SET estado = ? WHERE comentario_id = ?;");
$resultado = $sentencia->execute([$estado, $id]);
return header('Location: ../listacomentarios.php'); 
?>