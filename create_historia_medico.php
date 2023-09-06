<?php 
session_start();
include('conexion.php');
$sintomas=$_POST['sintomas'];
$diagnostico=$_POST['diagnostico'];
$tratamiento=$_POST['tratamiento'];
$receta=$_POST['receta'];
$id_historia = $_GET['id'];
$id_medico = $_SESSION['id'];

$sql2="SELECT p.id as 'id' FROM paciente p INNER JOIN historia h ON h.id_paciente = p.id WHERE h.id = $id_historia";
$resultado = $con->query($sql2);
$data = $resultado->fetch_assoc();


$sql="INSERT into descripcion (sintomas, diagnostico, tratamiento, receta, id_historia, id_medico )
VALUES ('$sintomas', '$diagnostico', '$tratamiento', '$receta', '$id_historia', '$id_medico')";


if ($con->query($sql) === TRUE) {

   $response = array('redirect' => $data['id']);
   echo json_encode($response);
   } else {
   echo "Error: " . $sql . "<br>" . $con->error;
}


?>