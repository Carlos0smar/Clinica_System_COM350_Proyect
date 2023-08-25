<?php 

include('conexion.php');

// se recupera el id del select de médicos
$hora=$_POST['hora'];
$medico_id=$_POST['medico'];
$paciente_id = $_SESSION['id']
$estado = $_POST['estado']

//echo $sql;

$sql="INSERT into citas (paciente_id, medico_id, fechaCita)
VALUES ('$paciente_id', '$medico_id', '$hora')";
// echo $sql;

if ($con->query($sql) === TRUE) {
    // echo "Se creo la ficha correctamente";
    header("location:ficha.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
<!-- 
<meta http-equiv="refresh" content="3; url=read.php" /> -->