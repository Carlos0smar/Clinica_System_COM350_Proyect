<?php  
	include('conexion.php');

	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$genero=$_POST['genero'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
    $tipo_sangre=$_POST['tipo_sangre'];
    $estatura=$_POST['estatura'];
    $peso=$_POST['peso'];
    $descripcion=$_POST['descripcion'];
    $id=$_POST['id'];


	$sql="INSERT INTO historia(altura,peso,direccion,num_emergencia,tipo_sanngre,id_paciente) VALUE('$estatura','$peso','$direccion','$telefono','$tipo_sangre','$id')";
	//echo $sql;
	$resultado=$con->query($sql);
	if ($resultado)
		echo "se registro con exito";
	else
		echo "error";

?>