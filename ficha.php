
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/ficha.css">
        <title>Document</title>
    </head>
    <body>
    <div class="table-container">
    <h1 class =" heading">Citas Medicas</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre Doctor</th>
                <th scope="col">Apellido Doctor</th>
                <th scope="col">Telefono Doctor</th>
                <th scope="col">fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include ("conexion.php");
                // include ("permiso_paciente.php");
                // $medico_id=$_POST['medico_id'];
                // $fecha=$_POST['fecha'];
                $paciente_id = $_SESSION['id'];
                $sql = "SELECT m.nombre as 'Nombre_Medico', m.apellido as 'Apellido_Medico', m.telefono as 'Telefono_Medico',c.fecha_mes as 'Fecha', c.fechaCita as 'Hora' FROM medico m 
                INNER JOIN citas c ON c.medico_id = m.id INNER JOIN paciente p ON c.paciente_id = '$paciente_id' WHERE p.id = '$paciente_id'";
                $resultado = $con->query($sql);
                if ($resultado->num_rows > 0) {
                    while($datos = $resultado -> fetch_assoc()) { ?>
                        <tr>
                            <?php $FECHA = $datos['Fecha'] ?>
                            <td><?= $datos['Nombre_Medico'] ?></td>
                            <td><?= $datos['Apellido_Medico'] ?></td>
                            <td><?= $datos['Telefono_Medico'] ?></td>
                            <td><?= $FECHA ?></td>
                            <td><?= $datos['Hora'] ?></td>
                            <!-- <td><a href="javascript: Historia_for_paciente(<?php echo $FECHA?>, <?php echo $paciente_id ?>)"<button type="button" class="ver">Ver</button></td> -->
                            <td>
                            <a href="javascript:void(0);" onclick="Historia_for_paciente('<?php echo $FECHA; ?>', <?php echo $paciente_id; ?>)">
                                <button type="button" class="ver">Ver</button>
                            </a>
                            </td>

                        </tr>
                    <?php }     
                }?>
                <!--else {
                // echo "Error: " . $sql . "<br>" . $con->error;
                //}

                //$con->close();-->
            </tbody>
          </table>
        </div>
        <!-- <button onclick="inicio()"type="button" class="btn btn-primary btn-lg">Aceptar</button> -->
        <a href="javascript: redirecIndex()"><button class="aceptar">Aceptar</button></a>
        <!-- <meta http-equiv="refresh" content="3; url=read.php" /> -->
     </body>
</html> 
