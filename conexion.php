<?php
$con =new mysqli("localhost:3307", "root", "","clinica");
if ($con->connect_error)
 die ("conexion fallida".$con->connect_error);
?>