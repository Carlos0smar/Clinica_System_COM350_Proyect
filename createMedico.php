<?php 

include('conexion.php');
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];
$telefono=$_POST['telefono'];
$informacion=$_POST['informacion'];
$especialidad=$_POST['especialidad'];
$email=$_POST['email'];


$sql="INSERT into medico (nombre, apellido, edad, telefono, informacion,especialidad, email )
VALUES ('$nombre', '$apellido', '$edad', '$telefono', '$informacion', '$especialidad', '$email')";


if ($con->query($sql) === TRUE) {

    $response = array('redirect' => 'readMedico.php');
    echo json_encode($response);
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>

