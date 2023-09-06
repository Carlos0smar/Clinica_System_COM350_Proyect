<?php 
session_start();
include('conexion.php');


$sql="SELECT fechaCita as 'hora', fecha_mes as 'dia' FROM citas";
// echo $sql;

$resultado = $con->query($sql);
if ($resultado) {

    $datos = array();
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }

    echo json_encode($datos, JSON_UNESCAPED_UNICODE);
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// $con->close();
?>
