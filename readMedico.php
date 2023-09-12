

<?php
include('conexion.php');
$sql = "select m.id as 'id', m.nombre as 'nombre', m.apellido as 'apellido' , m.edad as 'edad', m.telefono as 'telefono',m.email as 'email', 
m.especialidad as 'especialidad', m.informacion as 'informacion', s.num_consultorio as 'sala' from sala s inner join medico m on s.id_medico = m.id";
$resultado = $con->query($sql);
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
    ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Especialidad</th>
                <th>Información</th>
                <th>Sala</th>
                <th>Editar</th>
            </tr>
            <?php while ($row = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['apellido'] ?></td>
                    <td><?php echo $row['edad'] ?></td>
                    <td><?php echo $row['telefono'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['especialidad'] ?></td>
                    <td><?php echo $row['informacion'] ?></td>
                    <td><?php echo $row['sala']?></td>
                    <td>
                        <a href="javascript: registrarEdit('<?php echo $row['id']?>')" class="primero"> Editar</a>
                            
                    </td> 
                </tr>
            <?php } ?>
        </table>
        <a href="javascript: cargarContenido('registro_m.html')" style = "margin: 10px;">
        <button>Añadir Nuevo Médico</button>
        </a>
        <!-- <button type="button" action="registro_m.html"></button> -->
    <?php
    } else {
        echo "La tabla no tiene datos que mostrar";
    }

    $con->close();
    ?>
</body>
</html>
