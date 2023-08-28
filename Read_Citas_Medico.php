<DOCTYPE Html>
    <html> 
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="Read_Citas_Medico.css">
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
                    </tr>
                </thead>
                <tbody>
                <?php
    				include "conexion.php";
					$sql = "SELECT p.nombre as 'nombre_paciente' , p.apellido as 'apellido_paciente', p.email as 'email_paciente' , c.fechaCita as 'fecha' From paciente p INNER JOIN citas c ON c.paciente_id = p.id";
					$resultado = $con->query($sql);
                    if ($resultado !== false) {
                        while($datos = $resultado -> fetch_assoc()) { ?>
                            <tr>
                                <td><?= $datos['nombre_paciente']?></td>
                                <td><?= $datos['apellido_paciente'] ?></td>
                                <td><?= $datos['email_paciente'] ?></td>
                                <td><?= $datos['fecha'] ?></td>
					</tr>
				<?php }
                }    
				?>
                </tbody>
            </table>
        </div>
    </body>

    </html>