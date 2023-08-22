<?php 

include('conexion.php');

// se recupera el id del select de médicos
$medico_id=$_POST['medico_id'];
$fecha=$_POST['fecha'];
$fecha = $_SESSION['id']
$sql = "SELECT m.nombre as medico_nombre, m.apellido as medico_apellido, m.telefono as telefono, c.fechacita as fecha FROM medico m INNER JOIN citas c ON c.medico_id = m.id
INNER JOIN paciente p ON c.paciente_id = p.id WHERE c.medico_id = m.id and c.paciente_id = p.id";
// echo $sql;

$resultado = $con->query($sql);
if ($resultado->num_rows > 0) {
    while ($ficha = $resultado -> fetch_assoc()) {

        // Esto debe ser modelado en html
        echo $ficha['medico_nombre'];
        echo $ficha['medico_apellido'];
        echo $ficha['telefono'];
        echo $ficha['fecha'];
    }


} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>



<meta http-equiv="refresh" content="3; url=read.php" />