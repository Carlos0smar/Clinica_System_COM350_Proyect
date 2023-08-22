<?php 

include('conexion.php');

// se recupera el id del select de médicos
$medico_id=$_POST['medico_id'];
$fecha=$_POST['fecha'];
$paciente_id = $_SESSION['id']
$estado = $_POST['estado']

//echo $sql;

$sql="INSERT into citas (paciente_id, medico_id, fechaCita, estado)
VALUES ('$paciente_id', '$medico_id', '$fechaCita', '$estado')";
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