<?php
include('conexion.php');
$sql = "SELECT id, nombre, apellido, edad, telefono, informacion, especialidad, email FROM medico";
//echo $sql;
$resultado = $con->query($sql);

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
                <th>informacion</th>
            </tr>
            <?php while ($row = $resultado->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['nombre'] ?> </td>
                    <td><?php echo $row['apellido'] ?></td>
                    <td><?php echo $row['edad'] ?></td>
                    <td><?php echo $row['telefono'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['especialidad'] ?></td>
                    <td><?php echo $row['informacion'] ?></td>
                </tr>
            <?php } ?>
        </table>
        <!-- <div id="formInsertar">
            <button type="button" id="inserta" onclick="cargarContenidoFetch('forminsertar.html')">Insertar</button>
        </div>
        <script src="ajax.js"></script> -->
    <?php
} else {
    echo "la tabla no tiene datos que mostrar";
}

// echo json_encode($medico, JSON_UNESCAPED_UNICODE);
$con->close();
?>