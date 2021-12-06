<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

include "Conexion.php";
class BlogsUserController {

    function listarBlogs($conn){
        $sql= "SELECT blogs.* FROM blogs";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record_set = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($record_set, $row);
        }

        echo json_encode($record_set);
    }
    function listarImagenes($conn){
        $sql= "SELECT imagen_blog.* FROM imagen_blog";
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
        $blog = new BlogsUserController();
        switch ($funcion) {
            case 'listarBlogs':
                $blog->listarBlogs($conn);
                break;
            case 'listarImagenes':
                $blog->listarImagenes($conn);
                break;
            default:
                # code...
                break;
        }
    }

?>