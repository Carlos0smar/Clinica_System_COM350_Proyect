<DOCTYPE Html>
    <html> 
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/Read_Paciente_Admin.css">
    </head>
    <body>
        <div class="table-container">
            <h1 class="heading">Pacientes</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Genero</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Historia</th>
                    </tr>
                </thead>
                <tbody>
                <?php
    				include "conexion.php";
					$sql = "SELECT id, nombre , apellido, genero, direccion, telefono, email From paciente";
					$resultado = $con->query($sql);
                    if ($resultado !== false) {
                        while($datos = $resultado -> fetch_assoc()) { ?>
                            <tr>
                                <td><?= $datos['nombre']?></td>
                                <td><?= $datos['apellido'] ?></td>
                                <td><?= $datos['genero'] ?></td>
                                <td><?= $datos['direccion'] ?></td>
                                <td><?= $datos['telefono'] ?></td>
                                <td><?= $datos['email']?></td>
                                
						<td>
                            <a href="javascript: formHistoria('<?php echo $datos['id']?>')" class="primero" >Registrar</a>
                            <a href="javascript: MostrarHistoria('<?php echo $datos['id']?>')" class="segundo"> Mostrar</a>
                            
                        </td> 
					</tr>
				<?php }
                }    
				?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
