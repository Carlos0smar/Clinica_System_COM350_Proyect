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
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            display: flex;
            /* justify-content: space-between; */
            background-color: #007bff;
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
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            margin-top: 20px;
            
         
        
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
            
            background-color: #007bff;
          
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

        /* .contenedor-superpuesto {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border: 1px solid #ccc;
        }
         */
        

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
					<span> <h3 sytle="color: white;">Horario</h3></span>
					<h4 sytle="color: white;">Horario de trabajo</h4>
					<div class="contenedor3">
					<form >
						<?php 
						$horas = array(   "08 AM",
						"09 AM",
						"10 AM",
						"11 AM",
						"12 PM",
						"01 PM",
						"02 PM",
						"03 PM",
						"04 PM",
						"05 PM");
						?>
					</form >
					</div>    
					<div id="tabla_horarios">
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- 
    <table style='border: 1px solid black; border-collapse: collapse; background-color: white; ' id="tabla_horarios"><?php
						if ($resultado2->num_rows > 0) {
						?>
							<tr style='border: 1px solid black'>
							<?php 
							$count = 0;
							while ($medico2 = $resultado2->fetch_assoc()){?>
								<th style="border: 1px solid black; padding: 6px;"> <?php echo $medico2['nombre']." ".$medico2['apellido']?></th>
									<?php
									$count++;
							}?>
							</tr>
							<?php 
							foreach ($horas as $hora){
								?>
								<tr style='border: 1px solid black'>
								<?php
									for($i = 0 ; $i< $count; $i++){?>

										<td style='border: 1px solid black; padding: 6px; text-align: center;'><?php echo $hora;?></td> 
										<?php
									}?>
								</tr><?php
							} ?>
							<?php
						}?>
					</table> -->

<!-- Enlace al archivo de scripts de Bootstrap (opcional si no utilizas componentes que requieran JavaScript) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- <script>
    console.log('entra');


    const hora = document.getElementById('hora');
    const horas = ["8", "9","10", "11", "14", "15", "16", "17"]
    const eventHora= new Date();

    for (let i = 0; i <horas.length; i++) {
        const option = document.createElement("option");

        // eventHora.setHours(horas[i], "0", "0");

        // const horaActual = eventHora.getHours();
        // const minutosActual = eventHora.getMinutes();
        var horaFormateada = `${horas[i]}:${'00'}:${'00'}`;

        if(horas[i] == "8" || horas[i] == "9"){
            horaFormateada = `${'0'}${horas[i]}:${'00'}:${'00'}`;
        }


        option.value = horaFormateada;
        option.text =  horas[i] + ":00";
        hora.appendChild(option);
    }

   
    // hora.addEventListener("change", function() {
    //     const opcionSeleccionada = selectDiaSemana.options[selectDiaSemana.selectedIndex];
    //     const fecha = opcionSeleccionada.dataset.fecha;
    //     fechaSeleccionada.textContent = `Fecha seleccionada: ${fecha}`;
    // });
    const selectDiaSemana = document.getElementById("dia");
    const fechaSeleccionada = document.getElementById("fecha-seleccionada");

    const diasSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
    const fechaActual = new Date();

    // Obtén el día de la semana actual (0 para Domingo, 1 para Lunes, etc.)
    const diaActual = fechaActual.getDay();

    // Calcula la fecha del primer día de la semana (Domingo)
    const primerDiaSemana = new Date(fechaActual);
    // primerDiaSemana.setDate(fechaActual.getDate() - diaActual);

    // Genera las opciones del select
    for (let i = 0; i < diasSemana.length; i++) {
        const option = document.createElement("option");

        option.text = diasSemana[i];
        
        // Calcula la fecha correspondiente al día de la semana
        const fechaDiaSemana = new Date(primerDiaSemana);
        fechaDiaSemana.setDate(primerDiaSemana.getDate() + i);

        // Formatea la fecha en formato "dd/mm/yyyy"
        const dd = String(fechaDiaSemana.getDate()).padStart(2, "0");
        const mm = String(fechaDiaSemana.getMonth() + 1).padStart(2, "0");
        const yyyy = fechaDiaSemana.getFullYear();
        const fechaFormateada = `${dd}d${mm}s${yyyy}`;
        console.log(fechaFormateada);
        option.value = fechaFormateada;
        // option.dataset.fecha = fechaFormateada;
        selectDiaSemana.appendChild(option);
    }
    
</script> -->


</body>
</html>
