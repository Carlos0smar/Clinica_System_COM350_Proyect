<?php 

include('conexion.php');
$sintomas=$_POST['sintomas'];
$diagnostico=$_POST['diagnostico'];
$tratamiento=$_POST['tratamiento'];
$receta=$_POST['receta'];
$id_historia=$_POST['id_historia'];
$id_medico=$_POST['id_medico'];



$sql="INSERT into descripcion (sintomas, diagnostico, tratamiento, receta, id_historia, id_medico )
VALUES ('$sintomas', '$diagnostico', '$tratamiento', '$receta', '$id_historia', '$id_medico')";


// if ($con->query($sql) === TRUE) {

 //   $response = array('redirect' => '');
 //   echo json_encode($response);
//    } else {
 //   echo "Error: " . $sql . "<br>" . $con->error;
// }


?>