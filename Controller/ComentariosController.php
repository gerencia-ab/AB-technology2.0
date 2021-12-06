<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

require_once ("Conexion.php");
if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }else if(!($user->rol($_SESSION['username'])=="Admin"))
    {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
    }
class ComentariosController {

    function agregarComentario($conn){
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
    }

    function eliminarComentario($conn){
        $id = $_POST["id"];
        
        $sentencia = $conn->prepare("DELETE FROM comentario WHERE comentario_id = ?;");
        $resultado = $sentencia->execute([$id]);
    }

    function listarComentarios($conn){
        $sql= "SELECT comentario.* FROM comentario WHERE estado = false ORDER BY parent_comentario_id desc, comentario_id desc";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record_set = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($record_set, $row);
        }

        echo json_encode($record_set);
    }
    function listarDeComentarios($conn){
        $sql= "SELECT comentario.* FROM comentario WHERE estado = true ORDER BY parent_comentario_id desc, comentario_id desc";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record_set = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($record_set, $row);
        }

        echo json_encode($record_set);
    }
    function aprobarComentario($conn){
        
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
        case 'agregarComentario':
            $comentario->agregarComentario($conn);
            break;
        case 'listarComentarios':
            $comentario->listarComentarios($conn);
            break;
        case 'listarDeComentarios':
            $comentario->listarDeComentarios($conn);
            break;
        case 'aprobarComentario':
            $comentario->aprobarComentario($conn);
            break;
        case 'eliminarComentario':
            $comentario->eliminarComentario($conn);
            break;
        default:
            # code...
            break;
    }
}
?>
