<?php
ob_start();
session_start();
   $servidor = "localhost";
   $usuario = "root";
   $password = "";
  
   try {
         $conn= new PDO("mysql:host=$servidor;dbname=AB_db", $usuario, $password);      
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       }
  
   catch(PDOException $e)
       {
       echo "La conexión ha fallado: " . $e->getMessage();
       $conn = null;
       }
       include('user.php');
       $user = new User($conn);
   
?>