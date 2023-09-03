<?php 
if ($_SESSION['nivel']!='administrador') {
    // header("location:mensaje_permiso.html");
    die("No tienes permiso para realizar esta accion");     
}
?>


