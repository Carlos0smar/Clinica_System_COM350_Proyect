
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <h1 class =" p-3">Citas Medicas</h1>
    <div class="col-8 p-4">
        <table class="table table-dark table-striped-columns">
            <thead class="bg-info">
              <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Nombre Doctor</th>
                <th scope="col">Apellido Doctor</th>
                <th scope="col">Telefono Doctor</th>
                <th scope="col">Hora</th>
                <!-- <th scope="col"></th> -->
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
                $sql = "SELECT m.nombre as 'Nombre_Medico', m.apellido as 'Apellido_Medico', m.telefono as 'Telefono_Medico', c.fechacita as 'Fecha' FROM medico m 
                INNER JOIN citas c ON c.medico_id = m.id INNER JOIN paciente p ON c.paciente_id = '$paciente_id' WHERE c.medico_id = m.id and c.paciente_id = '$paciente_id'";
                $resultado = $con->query($sql);
                if ($resultado->num_rows > 0) {
                    while($datos = $resultado -> fetch_assoc()) { ?>
                        <tr>
                            <td><?= $datos['Nombre_Medico'] ?></td>
                            <td><?= $datos['Apellido_Medico'] ?></td>
                            <td><?= $datos['Telefono_Medico'] ?></td>
                            <td><?= $datos['Fecha'] ?></td>
                            <!-- <td><button type="button" class="btn btn-primary">Editar</button></td>  -->
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
        <a href="javascript: redirecIndex()"><button class="btn btn-primary btn-lg">Aceptar</button></a>
        <!-- <meta http-equiv="refresh" content="3; url=read.php" /> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
     </body>
</html> 
