<?php require('Controller/Conexion.php');

//logout
$user->logout(); 

//logged in return to index page
header('Location: index.php');
exit;
?>