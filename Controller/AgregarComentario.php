<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

require_once ("Conexion.php");
$commentId = isset($_POST['comentario_id']) ? $_POST['comentario_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$commentSenderName = isset($_POST['name']) ? $_POST['name'] : "";
$Telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$Correo = isset($_POST['correo']) ? $_POST['correo'] : "";
$Estado = 0;
if($commentId == "")
{
    $commentId=0;
}

$sql = "INSERT INTO comentario(parent_comentario_id,comment,comment_sender_name,telefono,correo,estado) VALUES (:parent_comentario_id, :comment, :comment_sender_name, :telefono, :correo, :estado)";

$statement = $conn->prepare($sql);
$statement->execute(array(
	'parent_comentario_id' => $commentId, 
    'comment' => $comment, 
    'comment_sender_name' => $commentSenderName, 
    'telefono' => $Telefono, 
    'correo' => $Correo,
    'estado' => $Estado
));
return $statement;
?>
