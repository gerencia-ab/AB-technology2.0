<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

require_once ("Conexion.php");
    if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }
class ComentariosController {

    function eliminarComentario($conn, $user){
        if(!($user->permisoeliminar($_SESSION['username'])==4))
        {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
        }
        $id = $_POST["id"];
        
        $sentencia = $conn->prepare("DELETE FROM comentario WHERE comentario_id = ?;");
        $resultado = $sentencia->execute([$id]);
    }

    function listarComentarios($conn, $user){
        if(!($user->permisoleer($_SESSION['username'])==1))
        {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
        }
        $sql= "SELECT comentario.* FROM comentario WHERE estado = false ORDER BY parent_comentario_id desc, comentario_id desc";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record_set = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($record_set, $row);
        }

        echo json_encode($record_set);
    }
    function listarDeComentarios($conn, $user){
        if(!($user->permisoleer($_SESSION['username'])==1))
        {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
        }
        $sql= "SELECT comentario.* FROM comentario WHERE estado = true ORDER BY parent_comentario_id desc, comentario_id desc";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record_set = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($record_set, $row);
        }

        echo json_encode($record_set);
    }
    function aprobarComentario($conn, $user){
        if(!($user->permisomodificar($_SESSION['username'])==3))
        {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
        }
        $id = $_POST["id"];
        $estado = 1;
        $sentencia = $conn->prepare("UPDATE comentario SET estado = ? WHERE comentario_id = ?;");
        $resultado = $sentencia->execute([$estado, $id]);
        
    }

}
if(isset($_POST['funcion']) ){
    $funcion = $_POST['funcion'];
    $comentario = new ComentariosController();
    switch ($funcion) {
        case 'listarComentarios':
            $comentario->listarComentarios($conn, $user);
            break;
        case 'listarDeComentarios':
            $comentario->listarDeComentarios($conn, $user);
            break;
        case 'aprobarComentario':
            $comentario->aprobarComentario($conn, $user);
            break;
        case 'eliminarComentario':
            $comentario->eliminarComentario($conn, $user);
            break;
        default:
            # code...
            break;
    }
}
?>