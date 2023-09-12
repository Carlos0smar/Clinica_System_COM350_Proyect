<?php 

include('conexion.php');
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];
$telefono=$_POST['telefono'];
$informacion=$_POST['informacion'];
$especialidad=$_POST['especialidad'];
$email=$_POST['email'];
$sala =$_POST['num_consultorio'];
$estadoSala ='No Disponible';
$id=$_POST['id'];


$sql="INSERT into medico (nombre, apellido, edad, telefono, informacion,especialidad, email )
VALUES ('$nombre', '$apellido', '$edad', '$telefono', '$informacion', '$especialidad', '$email')";
$sql2 ="INSERT INTO sala (num_consultorio,estado,id_medico) VALUES ('$sala', '$estadoSala','$id')";


if ($con->query($sql)  === TRUE) {
    if($con->query($sql2) === TRUE) {
    $response = array('redirect' => 'readMedico.php');
    echo json_encode($response);
    }
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


?>

