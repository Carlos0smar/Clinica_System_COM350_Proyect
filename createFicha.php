<?php 
session_start();
include('conexion.php');

// se recupera el id del select de médicos
$hora_cita=$_POST['hora'];
$dia_cita=$_POST['dia'];
$medico_id=$_POST['id_medico'];
$paciente_id = $_SESSION['id'];
// $estado = $_POST['estado'];

//echo $sql;

$sql="INSERT into citas (paciente_id, medico_id, fechaCita, fecha_mes)
VALUES ('$paciente_id', '$medico_id', '$hora_cita', '$dia_cita')";
// echo $sql;

if ($con->query($sql) === TRUE) {

    $response = array('redirect' => 'ficha.php');
    echo json_encode($response);
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
