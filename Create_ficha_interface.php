<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva en el Hospital</title>
    
    <!-- Enlace al archivo de estilos de Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }
/* 
        .btn btn-primary{
            background-color:  #E6F0F6 !important;
        } */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            display: flex;
            /* justify-content: space-between; */
            background-color: #283E61;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 2 2;
            
        }
        .card-body {
            padding: 15px;
          
        }
        .form-label {
            font-weight: bold;
            text-align: center; /* Si deseas centrar el contenido dentro del contenedor */
            
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px;
        }
        .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 10px 20px !important;
            margin-top: 20px !important;
                   
        }
        .contenedor {
         
           margin-top: 20px;
        }
        .contenedor2 {
			/* color: white; */
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px 50px;
            
            background-color:  #E6F0F6;
          
         }
         .contenedor3 {
            margin-top: 40px;
            
         }
         
         .contenedor-principal {
            position: relative;
            width: 400px;
            height: 300px;
            background-color: #f0f0f0;
        }

        table{
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            color: white;

        }
        table thead{
            background-color: #283E61;
        }
        table, th, td {
        border: 1px solid #ccc;
        }

        th, td {
        padding: 10px;
        text-align: center;
        }

        .hora{
            background-color: #283E61;
        }
        button {
        width: 100%;
        height: 40px;
        background-color: white;
        border: 1px none;
        cursor: pointer;
        border-radius: 15px; 
        }

        button.red {
        background-color: red;
        }



        .contenedor-superpuesto:nth-child(2) {
            top: 43%;
            left: 35%;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 60px;
            border: 0px solid #ccc;
        
        } 
        .contenedor-superpuesto2 {
            display: flex;
            align-items: center;
            /* position: relative; */
            /* top: 8.5%; */
            /* left: 10%; */
            /* transform: translate(-50%, -50%); */
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border: 1px solid #ccc;
        }
    
        .contenedorIm {
         width: 300px;
         height: 300px;
        }
        .contenedorIm2 {
         width: 100px;
         height: 20px;
         margin-right: 20px;
      }
    </style>
    <!-- <script src="js/fetch.js"></script> -->
</head>
<body>

<?php
include('conexion.php');

$sql = "SELECT id, apellido, nombre FROM medico WHERE  especialidad = 'Medico General'";
$sql2 = "SELECT id, apellido, nombre FROM medico WHERE  especialidad = 'Medico General'";
$resultado = $con->query($sql);
$resultado2 = $con->query($sql2);
?>

	<div class="container">
		<div class="col">
			<div class="card">

				<div class="card-header">
					<h2 class="mb-0" style="text-align: center; color: white;" >Reservaciones</h2>
					
				</div>

				<div class="card-body">
					<form action= "javascript: registrarFicha()" id="formFicha">
						<div class="contenedorIm">
							<img src="images/22.jpg" alt="Mi Imagen"  width="1350" height="300">
						</div>
						<div class="contenedor-superpuesto">
							<div class="contenedor3">
								<label for="dia" class="form-label" required>Día:</label>
                                <select class="form-select" id="dia" name="dia" required ></select>
                                <p id="fecha-seleccionada"></p>

							</div>
                            <div class="contendor3">
								<label for="hora" class="form-label" required>Hora:</label>
                                <select class="form-select" id="hora" name="hora"  ></select>
                                <script>console.log('hola')</script>

                            </div>
							<div class="contenedor3">
								<label for="medico" class="form-label" required>Médico</label>
								<select class="form-select" id="id_medico" name="id_medico" required>
								<?php while ($medico = $resultado->fetch_assoc()){
									?>
									<option value="<?php echo $medico['id']?>"><?php echo $medico['nombre']." ".$medico['apellido'];?> </option>
								<?php
								}?>
								</select>
							</div>
							
							<div class="contenedor3">
								<button type="submit" class="btn btn-primary">hacer cita</button> 
							</div>
						</div>
					</form>
				</div>

				<div class="contenedor2">
					<div class="feature-icon mb-4">
						<!-- <i class="icofont-ui-clock"></i> -->
					</div>
					<span> <h3 sytle="color: white !important;">Horario</h3></span>
					<h4 sytle="color: white !important;">Horario de trabajo</h4>
					<div class="contenedor3" id="tabla_horarios">
					<!-- <div id="tabla_horarios">
					</div> -->
					</div>    
				</div>
			</div>
		</div>
	</div>

</body>
</html>
