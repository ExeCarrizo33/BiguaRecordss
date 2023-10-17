<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$database = "biguarecords";


$connection = new mysqli($servername, $username, $password, $database);


if ($connection ->connect_errno ) {
    echo "La conexión no se ha podido establecer.";
    die ("conexion fallida".$conexion->connect_errno) ;
  
  }
  


?>
