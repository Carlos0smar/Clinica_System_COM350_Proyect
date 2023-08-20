<?php
$con =new mysqli("localhost", "root", "","clinica");
if ($con->connect_error)
 die ("conexion fallida".$con->connect_error);
?>