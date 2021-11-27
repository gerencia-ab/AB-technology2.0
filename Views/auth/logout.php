<?php 
    require('../../Controller/Conexion.php');
    // Cerrar sesión
    $user->logout(); 
    header('Location: login.php');
    exit;
?>