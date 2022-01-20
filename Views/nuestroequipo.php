<?php 

    require('../Controller/Conexion.php'); 
    $sql= "SELECT equipo.nombre, equipo.id FROM equipo WHERE equipo.cargo LIKE '%cofundador%' OR equipo.funcion LIKE '%cofundador%'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $cofundadores = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        array_push($cofundadores, $row);
    }
    $sql2= "SELECT equipo.nombre, equipo.id FROM equipo WHERE equipo.cargo LIKE '%desarrollador%' OR equipo.funcion LIKE '%desarrollador%'";
    $statement2 = $conn->prepare($sql2);
    $statement2->execute();
    $desarrolladores = array();
    while ($row = $statement2->fetch(PDO::FETCH_ASSOC)) {
        array_push($desarrolladores, $row);
    }
    $sql3= "SELECT equipo.nombre, equipo.id FROM equipo WHERE equipo.cargo LIKE '%marketing%' OR equipo.funcion LIKE '%marketing%'";
    $statement3 = $conn->prepare($sql3);
    $statement3->execute();
    $marketing = array();
    while ($row = $statement3->fetch(PDO::FETCH_ASSOC)) {
        array_push($marketing, $row);
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
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 mt-5 panelAdministrativo">
                    <div class="text-center mb-5 mt-4">
                        <h2>Nuestro equipo AB-TECHNOLOGY GROUP</h2>
                    </div> 
                    <div class="text-center">
                        <h3>Cofundadores</h2>
                    </div>   
                    <?php 
                        foreach ($cofundadores as $equipo) {
                    ?>                  
                        <div class="mb-3 text-center">
                            <a class="btn btn-outline-success" href="http://localhost/AB-technology2.0/Views/equipoprueba.php?id=<?php echo $equipo['id']; ?>"><?php echo strtoupper($equipo['nombre']); ?></a>
                        </div>
                    <?php
                    }?>
                    <div class="text-center">
                        <h3>Marketing</h2>
                    </div>   
                    <?php 
                        foreach ($marketing as $equipo) {
                    ?>                  
                        <div class="mb-3 text-center">
                            <a class="btn btn-outline-success" href="http://localhost/AB-technology2.0/Views/equipoprueba.php?id=<?php echo $equipo['id']; ?>"><?php echo strtoupper($equipo['nombre']); ?></a>
                        </div>
                    <?php
                    }?>
                    <div class="text-center">
                        <h3>Desarrolladores</h2>
                    </div>   
                    <?php 
                        foreach ($desarrolladores as $equipo) {
                    ?>                  
                        <div class="mb-3 text-center">
                            <a class="btn btn-outline-success" href="http://localhost/AB-technology2.0/Views/equipoprueba.php?id=<?php echo $equipo['id']; ?>"><?php echo strtoupper($equipo['nombre']); ?></a>
                        </div>
                    <?php
                    }?>
                    
                </div>
            </div>
        </div>
        <div class="auxFooter">
            <?php
                include_once '../php/footer.php';    
                include '../php/scripts/scriptsJS.php'
            ?>    
        </div>
    </body>
</html>