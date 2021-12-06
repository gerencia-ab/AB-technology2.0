<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

require_once ("Conexion.php");
    if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }
class RolesController {

    function listarRoles($conn, $user){
        if(!($user->permisoleer($_SESSION['username'])==1))
        {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
        }
        $sql= "SELECT roles.* FROM roles";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record_set = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($record_set, $row);
        }

        echo json_encode($record_set);
    }
    function agregarRol($conn, $user){
        if(!($user->permisoregistrar($_SESSION['username'])==2))
        {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
        }

        $rol = isset($_POST['rol']) ? $_POST['rol'] : "";
        $permisos = $_POST['permisos'];
        
        $sql = "INSERT INTO roles(name) VALUES (:name)";
    
        $statement = $conn->prepare($sql);
        $statement->execute(array(
            'name' => $rol
        ));
        $stmt_select = $conn->prepare('SELECT Max(id) as id FROM roles');
        $stmt_select->execute();
        $idrow=$stmt_select->fetch(PDO::FETCH_ASSOC);
        
        foreach($permisos as $permiso)
        {
            $arrayPermisos = explode(",", $permiso);
            foreach ($arrayPermisos as $value) {
                $sql2 = "INSERT INTO permiso_rol(id_rol, id_permiso) VALUES (:id_rol, :id_permiso)";

                $statement2 = $conn->prepare($sql2);
                $statement2->execute(array(
                    'id_rol' => $idrow['id'],
                    'id_permiso' => $value
                )); 
            }
            
           
        }

        
        return $statement2;
    }
    function actualizarRol($conn, $user){
        if(!($user->permisomodificar($_SESSION['username'])==3))
        {
            header('Location: ../auth/memberpage.php'); 
            exit(); 
        }
        $id = $_POST["id"];
        $name = isset($_POST['rol']) ? $_POST['rol'] : "";
        $permisos = $_POST['permisos'];
        $sentencia = $conn->prepare("UPDATE roles SET name = ? WHERE id = ?;");
        $resultado = $sentencia->execute([$name, $id]);
        $sentenciapermiso = $conn->prepare("DELETE FROM permiso_rol WHERE id_rol = ?;");
        $resultadopermiso = $sentenciapermiso->execute([$id]);
        foreach($permisos as $permiso)
        {
            $arrayPermisos = explode(",", $permiso);
            foreach ($arrayPermisos as $value) {
                $sql2 = "INSERT INTO permiso_rol(id_rol, id_permiso) VALUES (:id_rol, :id_permiso)";

                $statement2 = $conn->prepare($sql2);
                $statement2->execute(array(
                    'id_rol' => $id,
                    'id_permiso' => $value
                )); 
            }
            
           
        }
        return $resultado;
    }

}
if(isset($_POST['funcion']) ){
    $funcion = $_POST['funcion'];
    $roles = new RolesController();
    switch ($funcion) {
        case 'listarRoles':
            $roles->listarRoles($conn, $user);
            break;
        case 'agregarRol':
            $roles->agregarRol($conn, $user);
            break;
        case 'actualizarRol':
            $roles->actualizarRol($conn, $user);
            break;
        default:
            # code...
            break;
    }
}
?>