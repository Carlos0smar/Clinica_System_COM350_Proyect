<?php 
session_start();
include('conexion.php');

// se recupera el id del select de médicos
$fechaCita=$_POST['hora'];
$medico_id=$_POST['id_medico'];
$paciente_id = $_SESSION['id'];
// $estado = $_POST['estado'];

//echo $sql;

$sql="INSERT into citas (paciente_id, medico_id, fechaCita)
VALUES ('$paciente_id', '$medico_id', '$fechaCita')";
// echo $sql;

if ($con->query($sql) === TRUE) {
    // echo "Se creo la ficha correctamente";
    $response = array('redirect' => 'ficha.php');
    echo json_encode($response);
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
