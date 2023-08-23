<?php
include('conexion.php');
$sql = "SELECT id, nombre, apellido, edad, telefono, informacion, especialidad, email FROM medico";
$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Título de tu página</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
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
                </tr>
            <?php } ?>
        </table>
    <?php
    } else {
        echo "La tabla no tiene datos que mostrar";
    }

    $con->close();
    ?>
</body>
</html>
