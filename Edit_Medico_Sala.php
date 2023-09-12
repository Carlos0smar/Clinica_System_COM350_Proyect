<?php
include('conexion.php');
session_start();

$id_medico = $_GET['id'];

$sql = "
select nombre , apellido , edad, telefono , informacion , especialidad from medico where id= $id_medico";
$sql2 = "SELECT id ,num_consultorio FROM sala WHERE estado ='Disponible'";

$resultado = $con->query($sql);
$resultado2 = $con->query($sql2);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edicion Medico</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="EstiloTable.css">
    <style>
        .edicion-form form{
           
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .edicion-form form .bloque{
            grid-column: 1 / 3;
        }
        .edicion{
            box-shadow: 0 0 20px 0 rgb(40, 62, 97, .3);
        }
        .edicion > * {
            padding: 1em;
        }
        .edicion-form form p{
            margin: 0 ;
            padding: 1em;
        }
        .boton{
            background: #283E61;
            border: 0;
            padding: 1em;
            color: #fff;
            text-align: center;
            margin: 0 auto;
            width: 20%;
        }
        .container {
            max-width: 1100px;
            margin-left: auto;
            margin-right: auto;
            padding: 1.5em;
            color: #283E61;
        }
        .sala{
            padding: 5em;
        }
    </style>
   
</head>
<body>
<div class="container">
    <?php
    if ($resultado->num_rows > 0) {
        $data = $resultado->fetch_assoc();
        ?>
        <h1 style = "text-align: center;"> EDITAR MEDICO</h1>
        <div class = "edicion">
        <div class="edicion-form">
            <h2>Editar</h2>
            <form method="POST" action="javascript:registrarEdit() " id="formMedico">
            <p>
            <label class="form-label">NOMBRE:</label><br>
            <input type="text" class="form-field" name="nombre" value="<?php echo $data['nombre'] ?>" readonly>
            </p>
            <p>
            <label class="form-label">APELLIDO:</label><br>
            <input type="text" class="form-field" name="nombre" value="<?php echo $data['apellido'] ?>" readonly>
            </p>
            <p>
            <label class="form-label">EDAD:</label><br>
            <input type="text" class="form-field" name="nombre" value="<?php echo $data['edad'] ?>" readonly>
            </p>
            <p>
            <label class="form-label">TELEFONO:</label><br>
            <input type="text" class="form-field" name="nombre" value="<?php echo $data['telefono'] ?>" readonly>
            </p>
            <p>
            <label class="form-label">INFORMACION:</label><br>
            <input type="text" class="form-field" name="nombre" value="<?php echo $data['informacion'] ?>" readonly>
            </p>
            <p>
            <label class="form-label">ESPECIALIDAD:</label><br>
            <input type="text" class="form-field" name="nombre" value="<?php echo $data['especialidad'] ?>" readonly>
            </p>
            <p class="sala">
            <label for="sala" class="form-label" required>SALA</label>
			<select class="form-select" id="id" name="id" required>
			<?php while ($sala = $resultado2->fetch_assoc()){
			?>
			<option value="<?php echo $sala['id']?>"><?php echo $sala['num_consultorio'];?> </option>
			<?php
			}?>
			</select>
            </p>
        </div>
        </div>
        <?php }?>
        <?php
        if($_SESSION['nivel']=='administrador'){?>
            <div class="boton-container">
                <a href="javascript: cargarContenido('readMemico.php') "><button class="boton">GUARDAR</button></a>
            </div>
        <?php
        }
        ?> 
        </form>
    </div>
</body>
</html>



