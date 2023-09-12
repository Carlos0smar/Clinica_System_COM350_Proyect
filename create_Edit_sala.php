<?php 

include('conexion.php');
$sala =$_POST['num_consultorio'];
$estadoSala ='No Disponible';
$id=$_POST['id'];

$sql2 ="INSERT INTO sala (num_consultorio,estado,id_medico) VALUES ('$sala', '$estadoSala','$id')";

if($con->query($sql2) === TRUE) {
    $response = array('redirect' => 'readMedico.php');
    echo json_encode($response);
    }
else {
        echo "Error: " . $sql . "<br>" . $con->error;
}
    
    
 ?>