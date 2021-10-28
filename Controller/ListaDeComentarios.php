<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once ("Conexion.php");
$sql= "SELECT comentario.* FROM comentario WHERE estado = true ORDER BY parent_comentario_id desc, comentario_id desc";
$statement = $conn->prepare($sql);
$statement->execute();
$record_set = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    array_push($record_set, $row);
}

echo json_encode($record_set);
?>