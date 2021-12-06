<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

include "Conexion.php";
    if(!$user->is_logged_in())
    { 
        header('Location: ../auth/login.php'); 
        exit(); 
    }else if(!($user->rol($_SESSION['username'])=="Admin"))
    {
        header('Location: ../auth/memberpage.php'); 
        exit(); 
    }
class BlogsController {

    public function subirArchivos($conn){
            
        try{
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
        
            $sql = "INSERT INTO blogs(titulo,descripcion) VALUES (:titulo, :descripcion)";

            $statement = $conn->prepare($sql);
            $statement->execute(array(
        	    'titulo' => $titulo, 
                'descripcion' => $descripcion, 
            ));
            $stmt_select = $conn->prepare('SELECT Max(id) as id FROM blogs');
            $stmt_select->execute();
            $idrow=$stmt_select->fetch(PDO::FETCH_ASSOC);
            $path = "/opt/lampp/htdocs/AB-technology/recursos/imagenes/";
           
            
            $countfiles = count($_FILES['files']['name']);
            $upload_location = "/opt/lampp/htdocs/AB-technology/recursos/imagenes/";
            $path2 = "/AB-technology/recursos/imagenes/";
            $files_arr = array();
            for($index = 0;$index < $countfiles;$index++){
                if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                    //$name = basename($_FILES["pictures"]["name"][$key]);
                    $filename = basename($_FILES['files']['name'][$index]);
                    $ext = strtolower(pathinfo($_FILES['files']['name'][$index], PATHINFO_EXTENSION));
                    $valid_ext = array("png","jpeg","jpg");
                    if(in_array($ext, $valid_ext)){
                        $path = $upload_location.$filename;
                        $path2 = $path2.$filename;
                        if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                            $sql = "INSERT INTO imagen_blog(imagen,blog_id) VALUES (:imagen, :blog_id)";

                            $statement = $conn->prepare($sql);
                            $statement->execute(array(
        	                    'imagen' => $path2,
                                'blog_id' => $idrow['id']
                            ));
                            $files_arr[] = $path;
                            $path2 = "/AB-technology/recursos/imagenes/";
                        }
                    }
                }
            }
            
            return $statement;

            
        }catch(Exception $e){
            echo 'error: '.$e->getMessage();
        }
    }
    function eliminarBlog($conn){
        $id = $_POST["id"];
        $path = "/opt/lampp/htdocs";
        $stmt_select = $conn->prepare('SELECT imagen FROM imagen_blog WHERE blog_id =:uid');
        $stmt_select->execute(array(':uid'=>$id));
        $record_set = array();
        while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            array_push($record_set, $row);
        }
        foreach ($record_set as $value) {
            unlink($path.$value['imagen']);
        }
        $sentenciaimg = $conn->prepare("DELETE FROM imagen_blog WHERE blog_id = ?;");
        $resultadoimg = $sentenciaimg->execute([$id]);
        $sentencia = $conn->prepare("DELETE FROM blogs WHERE id = ?;");
        $resultado = $sentencia->execute([$id]);
        return $resultado;
    }

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
        $blog = new BlogsController();
        switch ($funcion) {
            case 'subirArchivos':
                $blog->subirArchivos($conn);
                break;
            case 'listarBlogs':
                $blog->listarBlogs($conn);
                break;
            case 'listarImagenes':
                $blog->listarImagenes($conn);
                break;
            case 'eliminarBlog':
                $blog->eliminarBlog($conn);
                break;
            default:
                # code...
                break;
        }
    }

?>