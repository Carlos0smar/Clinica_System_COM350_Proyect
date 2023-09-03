<?php
include('conexion.php');
session_start();

$id_paciente = $_GET['id'];

$sql = "SELECT p.id, p.nombre as 'nombre_paciente', p.apellido as 'apellido_paciente', h.fecha_nac as 'fech_nacimiento', 
h.peso as 'peso', h.altura as 'altura', h.tipo_sanngre as 'tipo_sangre', h.alergia as 'alergia'
FROM historia h INNER JOIN paciente p ON h.id_paciente = p.id WHERE p.id = $id_paciente;";

$resultado = $con->query($sql);

if(isset($_SESSION['nivel'])){
    
    if($_SESSION['nivel'] == 'administrador'){
        
        $sql2 = "SELECT d.sintomas as 'sintoma', d.diagnostico as 'diagnostico', d.tratamiento as 'tratamiento', d.receta as 'receta', 
        d.fecha as 'fecha_consulta', m.nombre as 'nombre_medico', m.apellido as 'apellido_medico' 
        FROM historia h INNER JOIN paciente p ON h.id_paciente = p.id INNER JOIN descripcion d ON d.id_historia = h.id 
        INNER JOIN medico m ON d.id_medico = m.id WHERE p.id = $id_paciente;";

        $resultado2 = $con->query($sql2);



    }elseif ($_SESSION['nivel']== 'paciente') {
        
        $fecha = $_GET['fecha'];

        $sql2 = "SELECT d.sintomas as 'sintoma', d.diagnostico as 'diagnostico', d.tratamiento as 'tratamiento', d.receta as 'receta', 
        d.fecha as 'fecha_consulta', m.nombre as 'nombre_medico', m.apellido as 'apellido_medico' 
        FROM historia h INNER JOIN paciente p ON h.id_paciente = p.id INNER JOIN descripcion d ON d.id_historia = h.id INNER JOIN 
        medico m ON d.id_medico = m.id WHERE d.fecha = $fecha AND h.id_paciente = $id_paciente;";

        $resultado2 = $con->query($sql2);


    }elseif ($_SESSION['nivel'] == 'medico'){

        $sql2 = "SELECT d.sintomas as 'sintoma', d.diagnostico as 'diagnostico', d.tratamiento as 'tratamiento', d.receta as 'receta', 
        d.fecha as 'fecha_consulta', m.nombre as 'nombre_medico', m.apellido as 'apellido_medico' 
        FROM historia h INNER JOIN paciente p ON h.id_paciente = p.id INNER JOIN descripcion d ON d.id_historia = h.id 
        INNER JOIN medico m ON d.id_medico = m.id WHERE p.id = $id_paciente;";

        $resultado2 = $con->query($sql2);

    }

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Título de tu página</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1 style = "text-align: center;"> MEDICOS</h1>
    <?php
    if ($resultado->num_rows > 0) {
        $data = $resultado->fetch_assoc();
        ?>
        <p>NOMBRE</p>
        <p> <?php echo $data['nombre_paciente'] ?></p>

        <p>APELLIDO</p>
        <p> <?php echo $data['apellido_paciente'] ?></p>
        
        <p>FECHA DE NACIMIENTO</p>
        <p> <?php echo $data['fech_nacimiento'] ?></p>
        
        <p>PESO</p>
        <p> <?php echo $data['peso'] ?></p>

        <p>ALTURA</p>
        <p> <?php echo $data['altura'] ?></p>

        <p>tipo sangre</p>
        <p> <?php echo $data['tipo_sangre'] ?></p>

        <p>alergia</p>
        <p> <?php echo $data['alergia'] ?></p>
        <?php
        if($resultado2->num_rows > 0){ ?>
            <table>
                <tr>
                    <th>Sintomas</th>
                    <th>Diagnostico</th>
                    <th>Tratamiento</th>
                    <th>Receta</th>
                    <th>Fecha</th>
                    <th>Medico</th>
                </tr>
                <?php while ($row = $resultado2->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['sintoma'] ?></td>
                        <td><?php echo $row['diagnostico'] ?></td>
                        <td><?php echo $row['tratamiento'] ?></td>
                        <td><?php echo $row['receta'] ?></td>
                        <td><?php echo $row['fecha_consulta'] ?></td>
                        <td><?php echo $row['nombre_medico']." ".$row['apellido_medico']?> </td>
                    </tr>
                <?php } ?>
            </table>
        <?php
        } else {?>

            <!-- ponerle diseño y centrar dentro del div -->
            <div> 
                <P> NO HAY HISTORIAS QUE MOSTRAR </p>
            </div>
            <?php
        }
    }
    $con->close();
    ?>
</body>
</html>



