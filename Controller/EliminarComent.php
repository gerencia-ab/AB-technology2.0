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

$sentencia = $conn->prepare("DELETE FROM comentario WHERE comentario_id = ?;");
$resultado = $sentencia->execute([$id]);
return header('Location: ../listacomentarios.php'); 
?>