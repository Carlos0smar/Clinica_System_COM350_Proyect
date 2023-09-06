<DOCTYPE Html>
    <html> 
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/Read_Citas_Medico.css">
    </head>
    <body>
        <div class="table-container">
            <h1 class="heading">Citas</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Hora</th>
                    <th>Historia</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    session_start();
    				include "conexion.php";
                    $id = $_SESSION['id'];
					$sql = "SELECT p.id as 'id_paciente',p.nombre as 'nombre_paciente' , p.apellido as 'apellido_paciente', p.email as 'email_paciente' , c.fechaCita as 'fecha' From paciente p INNER JOIN citas c ON c.paciente_id = p.id
                    INNER JOIN medico m ON c.medico_id = m.id WHERE c.medico_id = $id";
					$resultado = $con->query($sql);
                    if ($resultado !== false) {
                        while($datos = $resultado -> fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $datos['nombre_paciente']?></td>
                                <td><?php echo $datos['apellido_paciente'] ?></td>
                                <td><?php echo $datos['email_paciente'] ?></td>
                                <td><?php echo $datos['fecha'] ?></td>
                                <td><a href="javascript: MostrarHistoria(<?php echo $datos['id_paciente']?>)"><button class="boton" type="button">HISTORIA</button></a></td>
					        </tr>
				<?php }
                }    
				?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
