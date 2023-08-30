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


	$sql="INSERT INTO historia (altura,peso,direccion,num_emergencia,tipo_sanngre,id_paciente) VALUES('$estatura','$peso','$direccion','$telefono','$tipo_sangre','$id')";

	$resultado=$con->query($sql);
	if ($resultado){

		$response = array('redirect' => 'Mostrar_Historia.php',
							'id'=> $id);
		echo json_encode($response);
	}
	else
	{

		echo "error";
	}

?>