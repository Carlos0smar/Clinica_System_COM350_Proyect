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
    $alergia=$_POST['alergia'];
    $fecha_nac=$_POST['fecha_nac'];
    $id=$_POST['id'];


	$sql="INSERT INTO historia (altura,peso,direccion,num_emergencia,tipo_sanngre,id_paciente, alergia, fecha_nac) VALUES('$estatura','$peso','$direccion','$telefono','$tipo_sangre','$id', '$alergia', '$fecha_nac')";

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