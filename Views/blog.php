<?php 
ini_set('display_errors', 1); 
error_reporting(E_ALL);

    require('../Controller/Conexion.php'); 
    if(!isset($_GET["titulo"])) exit();
    $id = $_GET["titulo"];
    $sentencia = $conn->prepare("SELECT * FROM blogs WHERE titulo = ?;");
    $sentencia->execute([$id]);
    $blog = $sentencia->fetch(PDO::FETCH_OBJ);
    if($blog === FALSE){
        header('Location: 404.php'); 
        exit();
    }
    $sql= "SELECT * FROM imagen_blog WHERE blog_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->execute([$blog->id]);
    $imagenes = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($imagenes, $row);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once '../php/scripts/scriptsCSS.php';
    ?>
</head>
    <body>
    <header class="bg-primary text-center">
            <?php
                include_once '../php/header.php';
            ?>
            <h1>Encabezado</h1>
        </header>
    <div class="container" >
    <h2 class="blog-titulo" style="color: #FFFFFF; margin-top: 50px;">Blog</h2>
    <article class="container mt-5 blog-contenedor">
        
        <header>
            
            <h1 class="blog-titulo"><?php echo $blog->titulo; ?></h1>
            <?php 
                foreach ($imagenes as $imagen) {
            ?>     
                <img src="<?php echo $imagen['imagen']; ?>" class="blog-imagen"/>
            <?php
            }?>
            <div class="container">
                
                <!-- <div class="row">
                    <p>Autor</p>
                    <p>Fecha</p>
                </div> -->


            </div>
            <br>
            <br>
        </header>

            <div class="blog-contenido">
                <?php echo nl2br($blog->descripcion); ?>
            </div>
        



    </article>
    </div>
    <div class="auxFooter">
            <?php
                include_once '../php/footer.php';    
                include '../php/scripts/scriptsJS.php'
            ?>    
        </div>  
</body>
</html>