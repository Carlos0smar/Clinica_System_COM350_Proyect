<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva en el Hospital</title>
    
    <!-- Enlace al archivo de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            margin-left: 500px;
        }
        .contenedor {
         
           margin-top: 20px;
        }
        .contenedor2 {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px 50px;
            margin-top: 20px;
            background-color: #007bff;
         }
    </style>
</head>
<body>

<?php
include('conexion.php');

$sql = "SELECT id, apellido FROM medico WHERE  especialidad = 'Medico General'";
$sql2 = "SELECT id, apellido FROM medico WHERE  especialidad = 'Medico General'";
$resultado = $con->query($sql);
$resultado2 = $con->query($sql2);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Reserva en el Hospital</h5>
                </div>
                <div class="card-body">
                    <form>
                        <!-- <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div> -->
                        
                        <div class="contenedor">
                            <label for="nombre" class="form-label" required>Hora:</label>
                            <input type="time" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <!-- <div class="contenedor">
                            <label for="nombre" class="form-label">Celular:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div> -->

                        <div class="contenedor">
                            <label for="medico" class="form-label" required>Médico</label>
                            <select class="form-select" id="medico" name="medico" required>
                            <?php while ($medico = $resultado->fetch_assoc()){
                                ?>
                                <option value="<?php echo $medico['id']?>"><?php echo $medico['apellido'];?> </option>
                            <?php
                            }?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">hacer cita</button>
                    </form>
                    
                </div>

                <div class="contenedor2">
                    <div class="feature-icon mb-4">
                        <i class="icofont-ui-clock"></i>
                    </div>
                    <span> <h3>Horario</h3></span>
                    <h4 class="mb-3">Horario de trabajo</h4>
                        <?php 
                        $horas = array(   "08:00 AM",
                        "09:00 AM",
                        "10:00 AM",
                        "11:00 AM",
                        "12:00 PM",
                        "01:00 PM",
                        "02:00 PM",
                        "03:00 PM",
                        "04:00 PM",
                        "05:00 PM");
                        ?>
                    <table style='border: 1px solid black'><?php
                        if ($resultado2->num_rows > 0) {
                        ?>
                            <?php 
                            while ($medico2 = $resultado2->fetch_assoc()){?>
                                <tr style='border: 1px solid black'>
                                    <th><?php echo $medico2['apellido']?></th>
                                </tr>
                            <?php   
                            }?>
                            <?php 
                                foreach ($horas as $hora){
                                ?>
                                <tr style='border: 1px solid black'><td style='border: 1px solid black'><?php echo $hora;?></td> </tr>
                            <?php 
                                } ?>
                            <?php
                        }?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enlace al archivo de scripts de Bootstrap (opcional si no utilizas componentes que requieran JavaScript) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
