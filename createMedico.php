<?php 

include('conexion.php');
// $password=sha1($_POST['password']);
// $nombre_usuario=$_POST['nombre_usuario'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];
$telefono=$_POST['telefono'];
$informacion=$_POST['informacion'];
$especialidad=$_POST['especialidad'];
// $nivel=$_POST['nivel'];
$email=$_POST['email'];


$sql="INSERT into medico (nombre, apellido, edad, telefono, informacion,especialidad, email )
VALUES ('$nombre_usuario', '$nombre', '$apellido', '$edad', '$telefono', '$informacion', '$especialidad', '$email')";
// echo $sql;

if ($con->query($sql) === TRUE) {
    echo "Se creo el registro correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>

<meta http-equiv="refresh" content="3; url=read.php" />